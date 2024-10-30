O projeto precisa de algumas configurações antes de ser rodado, são elas 

1- certifique-se que a pasta seja nomeada como BECO. Nehuma outra pasta deve estar dentro ou envolvendo esse repositório além do htdocs, isso é necessário para o direcionamento dos emails.
2- no arquivo php.ini, localizado no diretório C:\xampp\php\php.ini, é necessário mudar a configuração "upload_max_filesize", ela é necessária para o upload de arquivos na criação da publicação. Ao localizá-la no documento com auxílio do CTRL+f, cole esse trecho no lugar: upload_max_filesize = 20M post_max_size = 25M 