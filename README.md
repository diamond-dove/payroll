

## About diamond dove payroll

is an Open Source Initiative for Payroll System - which means you can grab the code to be use in your exisitng Laravel application.

Following are the features provided:

- Multiple Earning and Deductions, based on organisation or employee
- Automated Payroll Calculation using Payroll Scheduler
- Each payroll will require at least a reviewer and an approver
- Customisable Payslip Design
- E-mail / Export the payslip to the employee
- Payroll Report for Administrator
- Payroll Report for Employee
- Custom Earnings and Deductions
- Customisable earnings and deductions calculation process
- Integration with vicidial

# Installation

## Docker
1. Run `docker-compose up`
2. Run `cp .env.example .env`
3. Run `php artisan genarate:key`
4. Run `./cb php artisan migration` 

If you want to run the docker container in background.
- To start `docker-compose up -d`.
- To stop `docker-compose down`.
- TO get into the container `docker exec -it nomina_app_1 /bin/bash`.

## Local
### requirements
- php 7.3
- composer
- mysql
- redis 5.0

### Setup
1. copy .env.example file to .env `cp .env.example .env`
2. Change .env setting
3. run `php artisan genarate:key`
4. run `php artisan run migration`
5. run `php artisan serve`



thinking to use this in the future:
[Open payroll](https://github.com/cleaniquecoders/open-payroll).
