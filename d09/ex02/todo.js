"use strict";
var btn = document.querySelector('.btn');
var list = document.querySelector('.list');
btn.addEventListener('click', newtodo);

if (getCookie('ft_list') != undefined) {
    var cookie = getCookie('ft_list');
    ft_list = cookie.split(';');
}
else
    var ft_list = [];

for ( var i = 0; i < ft_list.length; i++)
    if (ft_list[i] != undefined)
        addtodo(ft_list[i]);

function newtodo () {
    var result = prompt('New TODO', '');
    if (result != null && result != '') {
        addtodo(result);
        ft_list.push(result);
        var tocook = ft_list.join(';');
        var options = {};
        options.expires = 3600;
        deleteCookie('ft_list');
        setCookie('ft_list', tocook, options);
    }
}

function addtodo (result) {
    var item = document.createElement('div');
        item.className = 'item';
        item.setAttribute('id', 'ft_list');
        item.setAttribute('onclick', 'removeitem(this)');
        item.innerHTML = result;
        list.insertBefore(item, list.firstChild);
}

function removeitem (elem) {
    var result = confirm('you want to remove that TO DO?');
    if (result === true)
    {
        for ( var i = 0; i < ft_list.length; i++)
            if (ft_list[i] == elem.innerHTML)
                ft_list.splice(i, 1);
        var tocook = ft_list.join(';');
        var options = {};
        options.expires = 3600;
        deleteCookie('ft_list');
        setCookie('ft_list', tocook, options);
        elem.remove();
    }
}

function setCookie(name, value, options) {
  options = options || {};
  var expires = options.expires;
  if (typeof expires == "number" && expires) {
    var d = new Date();
    d.setTime(d.getTime() + expires * 1000);
    expires = options.expires = d;
  }
  if (expires && expires.toUTCString) {
    options.expires = expires.toUTCString();
  }
  value = encodeURIComponent(value);
  var updatedCookie = name + "=" + value;
  for (var propName in options) {
    updatedCookie += "; " + propName;
    var propValue = options[propName];
    if (propValue !== true) {
      updatedCookie += "=" + propValue;
    }
  }
  document.cookie = updatedCookie;
}

function deleteCookie(name) {
  setCookie(name, "", {
    expires: -1
  })
}

function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}