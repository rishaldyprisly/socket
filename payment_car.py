import socket
import sys

result1 = sys.argv[1] #Data Dari PHP Via Exec


results1 = bytes(result1, encoding= 'utf-8') #Translating Bytes To String


HOST = 'localhost' # IP Address PC Kasir - Ganti Baris Ini

PORT = 6666 # Sock Port

with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
    s.connect((HOST, PORT))
   # data = 'result'
    s.sendall(results1)
    s.close()
#print(result)
            

