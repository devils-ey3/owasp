import fileinput
with open("/opt/lampp/etc/httpd.conf", "a") as myfile:
    myfile.write("ServerSignature Off\n")
    myfile.write("ServerTokens Prod")
with fileinput.FileInput('/opt/lampp/etc/php.ini', inplace=True, backup='.bak') as file:
    for line in file:
        print(line.replace('expose_php=On', 'expose_php=Off'), end='')



