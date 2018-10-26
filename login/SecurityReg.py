import hashlib
import threading
import secrets
import binascii

def getPassword():
    UserPass = input("Please enter password: ")
    return UserPass

def ThreadA(UserPass):
    SaltA = secrets.token_hex(16)
    BySaltA = str.encode(SaltA)
    HashA = hashlib.pbkdf2_hmac('sha512', UserPass, BySaltA, 250000)
    HexHashA = binascii.hexlify(HashA)
    with open("SideA.txt", "wb") as SideA:
        SideA.write(HexHashA)
    SideA = open('SideA.txt', 'a')
    SideA.write('\n')
    SideA.write(SaltA)

def ThreadB(UserPass):
    SaltB = secrets.token_hex(16)
    BySaltB = str.encode(SaltB)
    HashB = hashlib.pbkdf2_hmac('sha256', UserPass, BySaltB, 300000)
    HexHashB = binascii.hexlify(HashB)
    with open("SideB.txt", "wb") as SideB:
        SideB.write(HexHashB)
    SideB = open('SideB.txt', 'a')
    SideB.write('\n')
    SideB.write(SaltB)

def main():
    print('start')
    UserPass = getPassword()
    ByUserPass = str.encode(UserPass)
    t1 = threading.Thread(target=ThreadA, args=(ByUserPass,))
    t2 = threading.Thread(target=ThreadB, args=(ByUserPass,))
    t1.start()
    t2.start()
    t1.join()
    t2.join()

main()