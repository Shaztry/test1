echo "Enter the Decryption file name...(with full path)"
read inputFile
echo "Enter the cipher....."
read decry
echo "Enter the outputFile name....."
read outputFile
echo "Decrypting the file......"
openssl $decry -d -a -in $inputFile -out $outputFile
echo "Decryption done.. Removing the enc file.."
rm -i $inputFile