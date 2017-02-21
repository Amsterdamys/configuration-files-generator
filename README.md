### Example

**Format of command**

php [config-path]/run.php [params]

#### **Example of command**

```
php run.php \
--ENVIROMENT="local"  \
--PROTOCOL="http"  \
--UNIX="true"  \
--SERVER__APP__ID="shaman-api"  \
--APIPATH="C:/OpenServer/domains/api/"  \
--APIHOSTNAME="api.shamancloud.dev" \
--CMSPATH="C:/OpenServer/domains/shaman"  \
--CMSHOSTNAME="cms.shamancloud.dev"  \
--CMS__SITENAME="cms.shamancloud.dev"  \
--PREVIEW__URL="preview.shamancloud.dev"  \
--HANDOUT__URL="http://handout.shamancloud.dev/"  \
--STORAGEPATH="C:/OpenServer/domains/shaman-storage"  \
--ONLINEMEETING__URL="http://localhost:3000/"  \
--DB__HOST="localhost"  \
--DB__ADMIN__NAME="shaman_admin" --DB__ADMIN__USERNAME="root" --DB__ADMIN__PASSWORD="testpassword"  \
--DB__TEST__NAME="shaman_test" --DB__TEST__USERNAME="root"  --DB__TEST__PASSWORD="testpassword"  \
--CMS__VERSION="1.0.2" --COMPANIESRELATIVEPATH="protected/cms/companies" \
--AMAZON__BUCKET="shamandev.com" --AMAZON__KEY="key" --AMAZON__SECRET="secret"  \
--CONVERTER__PROTOCOL="https" --CONVERTER__HOST="convert.shamandev.com" --CONVERTER__APIKEY="key"  \
--CONVERTER__CALLBACKURL="null" --CONVERTER__FROMAT="png"   \
--CONVERTER__PROXY__ADDRESS="168.63.102.6" --CONVERTER__PROXY__PORT="33139"  \
--CONVERTER__PROXY__USER="vladimir" --CONVERTER__PROXY__PASSWORD="password"  \
--MAILER__ENCRYPTION="ssl" --MAILER__FROMEMAIL="demo@gmail.com" --MAILER__FROMNAME="demo"  \
--MAILER__HOST="smtp.gmail.ru" --MAILER__PASSWORD="passwordemail" --MAILER__PORT="465"  \
--MAILER__USEFILETRANSPORT="true" --MAILER__USERNAME="demo@gmail.com" --MAILSENDER__REDIRECTTO=""  \
--MEDIAURL="//127.0.0.1:8000/" --MEDIA__PORT="8000"  \
--MEDIA__DEFAULT__TYPE="1" --MEDIA__EXPIRES__MS="31536000000" --MEDIA__TIMEOUT="60000"  \
--NOTIFY__HOSTNAME="http://localhost" --NOTIFY__PORT="8001"  \
--NOTIFY__RECONNECTIONDELAY="60000" --NOTIFY__RECONNECTIONDELAYMAX="300000" \
--NOTIFY__NAMESPACE="/"  \
--ONLINEMEETING__DEFAULT__IMAGE__WIDTH="2048" --ONLINEMEETING__DEFAULT__IMAGE__HEIGHT="1536"  \
--ONLINEMEETING__HOSTNAME="http://127.0.0.1" --ONLINEMEETING__PORT="3000"  \
--PARAMS__ADMINKEY="adminkey"  \
--PARAMS__ADMINWHITELIST="[\"127.0.0.1\",\"127.0.0.2\"]"  \
--PARAMS__ANONYMIZE__SKIPEMAILS="[\"my_email@test.com\",\"test@gmail.com\"]"  \
--PARAMS__BUGREPORTEMAILS="[\"my_email@test.com\",\"test@gmail.com\"]"  \
--PARAMS__HANDOUTKEY="HANDOUTKEY"  \
--PARAMS__INTERCOMAPPID=""  \
--PARAMS__IPSWHITELIST="[\"127.0.0.1\",\"127.0.0.2\"]" \
--PARAMS__LOGINKEY="loginkey"  \
--PARAMS__MEDIAADMINKEY="key" \
--PARAMS__PKEY="pkey"  \
--PARAMS__SALTTEMPLATE="salt"  \
--PARAMS__SECURE="true"  \
--PARAMS__SESSIONLIFETIME="1200"  \
--PARAMS__TESTS__COMPANY="web-2015" --PARAMS__TESTS__COMPANY2="stasbanana"  \
--REDIS__CLASS__NAME="yii\\\\redis\\\\Session" --REDIS__DATABASE="0"  \
--REDIS__DATATIMEOUT="120000" --REDIS__HOSTNAME="localhost" --REDIS__PORT="6379"  \
--SESSION__DOMAIN=".shamancloud.dev" --SESSION__LIFETIME="1200"  \
--SESSION__SECURE="false" --SESSION__TIMEOUT="1200"  \
--TIMEBETWEENQUERYSTATUS="600000" \
--INTERCOM__APPKEY="" \
--INTERCOM__SALT=""
```

List of parameters see in [parameters.yml](configs/parameters.yml.dist)
You **must** either provide the command-line parameters or `parameters.yml` file.
