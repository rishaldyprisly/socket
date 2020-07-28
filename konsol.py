import ftplib
from zipfile import ZipFile
import datetime
import time

newfile = ('919513_consolidation_'+time.strftime('%Y%m%d%H%M%S')+'_v1.csv')

os.rename(r'/Volumes/RAID/htdocs/posc-1/car-1/transaction/car/consolidation.csv', r'/Volumes/RAID/htdocs/posc-1/car-1/transaction/car/'+ newfile)
newfile = 

zipobj   = ZipFile('919513_consolidation_'+time.strftime('%Y%m%d%H%M%S')+'_v1.zip', 'w')
zipobj.write(newfile)
zipobj.close()

#session = ftplib.FTP('server.com', 'username', 'password',)
#file = open('konsol.zip', 'rb')
#session.storbinary('STOR konsol.zip', file)
#file.close()
#session.quit()