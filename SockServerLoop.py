#CASHIER DEPENDENCIES
from XOR_CheckSum import *
import serial
import sys
import socket
import time
import json




HOST = 'localhost'  # IP Address Server TO BE EDITTED
PORT = 6666       
while True:
    with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
        s.bind((HOST, PORT))
        s.listen()
        conn, addr = s.accept()
        with conn:
            print('Connected by', addr)
            print()
            data = conn.recv(1024)
            #print('received', repr(data.decode('utf-8')))
            #print('Converted to Hex', data.decode('hex'))
            datasock = data.hex()
            print('Converted to Hex : ', datasock)

    ser = serial.Serial('/dev/cu.UC-232AC', 115200, timeout=1) #TO BE EDITTED
    ser.bytesize = serial.EIGHTBITS
    ser.parity = serial.PARITY_NONE
    ser.stopbits = serial.STOPBITS_ONE
    ser.timeut = None
    ser.xonxoff = False
    ser.rtscts= False
    ser.dsrdtr = False
    ser.close()
    #ßßßser.writeTimeout = 0
    #print sys.argv[1]
    #cek saldo 100204 3030303031310000 00 1003
    header = bytes.fromhex('100201')
   # body = bytes.fromhex('303030303131002A323334353630303030303030303030303030303330303030353030303235303932303138313631353032')
    body = bytes.fromhex(datasock)
    footer = bytes.fromhex('1003')
    r = hex(xor_checksum_string(body))
    o = bytes.fromhex(r[2:])
    print()

    hasil = str(header.decode())+ str(body.decode()) + str(o.decode()) + str(footer.decode())
    print (hasil)
    print()
    y = (hasil.encode('utf-8').hex())
    print (y)
    ser.open()
    ser.write(hasil.encode())
    time.sleep(4)
   

    
    response = ser.read(size = 512)
    responses = (response).decode('utf-8')
    print ('ID Transaction :  ', (responses[15:31]))
    print ('AMMOUNT        :  ', (responses[31:40]))
    print ('DATE TIME      :  ', (responses[40:54]))
    print ('PAN            :  ', (responses[54:70]))
    print ('PREV BALANCE   :  ', (responses[70:78]))
    print ('CURENT BALANCE :  ', (responses[78:86]))
    print ('CARD TYPE      :  ', (responses[86:89]))
    print ('RESPONSE       :  ', (responses[89:512]))


    data = {'idtransaksi':responses[15:31], 'jumlah':responses[31:40], 'pan':responses[54:70], 'sa':responses[70:78], 'sk':responses[78:86], 'tanggal':responses[40:54], 'bank':responses[86:89]}
    with open('data.json', 'w') as outfile:
        json.dump(data, outfile)

    with open('consolidation.csv', 'a') as out:
        out.write(responses[89:512] + '\n')

    with open('response_err.json', 'w') as errorfile:
        json.dump(responses[89:512], errorfile)

   



    continue