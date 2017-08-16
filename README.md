# Tiller Test Dev Backend

## Installation

### Pre-requisite

[docker](https://docs.docker.com/engine/installation/) `min version 1.12.2`
[docker-compose](https://docs.docker.com/compose/install/) `min version 1.8.0`

### Docker compose

First, you will have to pull the current repository.
Inside the directory execute the followings commands:

```bash
docker-compose build
docker-compose up -d
```

### Connect to the docker

```bash
docker exec -it back_php_1 bash
```


## Test 1

Write a webservice that compute the sum of the numbers in a given list using a for-loop, foreach-loop, a while-loop, and recursion.

[Link](https://github.com/tillersystems/test-back/wiki/Test-1)

## Test 2

Write a webservice that combines two lists by alternatingly taking elements. For exemple: given two lists [A, B, C] and [1, 2, 3], the results sould be [A, 1, B, 2, C, 3]

[Link](https://github.com/tillersystems/test-back/wiki/Test-2)

## Test 3

Let's A be a matrix
```
A = [ 2  3  2  1 ]  Allowed moves : → or ↓
    [ 5  2  3  1 ]
    [ 1  2  2  1 ]
width = 4
heigh = 3
```
 
You can move RIGTH or DOWN.
You cannot move UP or LEFT. 

Write a webservice that calculate the highest path sum in a matrix
following this rule (move only RIGTH or DOWN)

[Link](https://github.com/tillersystems/test-back/wiki/Test-3)

## Test 4

Write a webservice that computes the list of the first n Fibonacci numbers. By definition, the first two numbers in the Fibonacci sequence are 0 and 1, and each subsequent number is the sum of the previous two.

As an example, here are the first 10 Fibonnaci numbers: [0, 1, 1, 2, 3, 5, 8, 13, 21, 34].

[Link](https://github.com/tillersystems/test-back/wiki/Test-4)

## Test 5

Write a function that given a list of non negative integers, arranges them such that they form the largest possible number. 

For example, given [50, 2, 1, 9] the largest formed number is 95021.

[Link](https://github.com/tillersystems/test-back/wiki/Test-5)

## Test 6

Write a program that outputs all possibilities to put + or - or nothing between the numbers 1, 2, ..., 9 (in this order) such that the result is always 100. 

For example: 1 + 2 + 34 – 5 + 67 – 8 + 9 = 100.
Formatted as "1+2+34-5+67-8+9".

[Link](https://github.com/tillersystems/test-back/wiki/Test-6)

ps: you're on a git, don't forget it ;)

