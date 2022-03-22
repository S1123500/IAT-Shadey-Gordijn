from bluetooth import *
import sys

def findDevices():
    print("performing inquiry...")

    nearby_devices = discover_devices(lookup_names = True)

    print("Found %d devices" % len(nearby_devices))

    for name, addr in nearby_devices:
        print("%s - %s" % (addr, name))


def main():
    findDevices()
    print("this")

if __name__ == '__main__':
    main()