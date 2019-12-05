The Reverse Hash Application
============================

This application uses a very simple brute force attack to 
"reverse" an MD5 hash.  It is really not reversing the hash
at all as that would be impossible.  Instead it knows that 
the original pre hash text was of four digit number with 
exactly 4 digits.

So the application uses four nested loops and tests all 
10*10*10*10 combinations of four digit numbers, and computes the
hashes of those values and checks to see if the computed hash
matches.

You can play with this application at:

by just copy paste the project in your localhost folder.

This is a lesson in how easy it is to crack short passwords
with a limited alphabet.  While this works well to crack 
very short passwords it is not practical as password 
length grows.

A more sophisticated attack ti reverse hashes which uses a 
lot of storage to pre-compute lots of hashes and look them up
quickly is called "Rainbow Tables".  This tiny application
is *not* using a Rainbow Table approach.

Steps to run the project:
1. Install xampp/wamp at your machine.
2. Copy and paste all pages in your htdoc/www directory of your xampp or wampp server.
3. Start your xampp/wamp and just paste url in your browser
	e.g.
	localhost/www/prijectfoldername



