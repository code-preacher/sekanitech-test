The two tables will be selected from the dropdown menu, then the setting data and matching data will be set also.
1) we will first correct the account number by setting client_acc_no=account_acc_no where the client.client_name = account.client_id
2) we will then correct the client id by setting account.client_id=client.client_name where account.acc_no=client.client_acc_no.
