function fetch()
{
  var result     = document.getElementById('fetch_result');
  var username   = document.getElementById('fetch_username');
  var password   = document.getElementById('fetch_password');
  var u          = username.value;
  var p          = password.value;
  username.value = null;
  password.value = null;
  var xhr        = new XMLHttpRequest();
  xhr.open('POST', 'utils/View.php');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload     = function()
  {
    if(this.readyState == 4)
    {
      if(this.responseText != 'false')
      {
        var data = JSON.parse(this.responseText);
        result.innerHTML = '<b>Username: ' + data.username + '<br />Password: ' + data.password + '<br />Date registered: ' + data.date_registered + '</b>';
        /*do stuff*/
      }
      else
      {
        result.innerHTML = '<b>the account is not registered or you have entered invalid credentials.</b>';
        /*do other stuffZ*/
      }
    }
  };
  xhr.send('action=fetch&username=' + u + '&password=' + p);
}
