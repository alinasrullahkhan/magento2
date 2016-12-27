# magento2
Pull the repository and add it under

app/code/

After adding the code run this command in cli

php bin/magento setup:upgrade

The above command will install the module after that execute the following command

php bin/magento cache:flush

Open Admin panel your module will be available in admin section.

