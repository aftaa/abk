# API ООО "АБК"

Зарегистрировать нового клиента<br>
Все поля обязательны к заполнению<br>
<br>
POST https://abk.aftaa.ru/client/create<br>
{<br>
  "first_name":"",<br>
  "last_name":"",<br>
  "passport_series":"",<br>
  "passport_number":"",<br>
  "license_series":"",<br>
  "license_number":"",<br>
  "phone":""<br>
}<br>
<br>
Ответ сервера:<br>
{<br>
  "success": true|false<br>
}<br>
<br>
