echo "Enter the input file name.....(with full path)"
read inputFile
echo "Enter the cipher..."
read encry
echo "Encrypting the file....."
openssl $encry -a -salt -in $inputFile -out $inputFile.enc
echo "Deleting the original file with confirmation..."
rm -i $inputFile