##python基本语法##

1、raw_input

	#!/usr/bin/python
	#coding=utf-8
	var = 1
	while var == 1 :  # 该条件永远为true，循环将无限执行下去
	   num = raw_input("Enter a number  :")
	   print "You entered: ", num
	
	print "Good bye!"


2、python实现素数判断

	#!/usr/bin/python
	#coding=utf-8
	for num in range(3,200):  #to iterate between 10 to 20
	   for i in range(2,num): #to iterate on the factors of the number
	      if num%i == 0:      #to determine the first factor
	         j=num/i          #to calculate the second factor
	         print '%d equals %d * %d' % (num,i,j)
	         break #to move to the next number, the #first FOR
	   else:                  # else part of the loop
	      print num, 'is a prime number'