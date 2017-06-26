"use strict";

    if (getCookie('ft_list') != undefined) {
        var cookie = getCookie('ft_list');
        ft_list = cookie.split(';');
    }
    else
        var ft_list = [];

    for ( var i = 0; i < ft_list.length; i++)
        if (ft_list[i] != undefined)
            addtodo(ft_list[i]);

function addtodo(result) {
    var container = document.getElementById('container');
    var div = document.createElement('div');
    div.setAttribute('id', 'ft_list');
    div.setAttribute('onclick', 'del_todo(this)');
    div.className = 'to-do';
    div.innerHTML = result;
    container.insertBefore(div, container.firstChild);
}

function new_div() {
    var result = prompt("Create new to-do", "");
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

function del_todo(div) {
    var i = 0;
    var str;
    if (confirm("Are you want to delete this to-do?")){
        while (ft_list[i])
        {
            str = div.innerHTML;
            if (ft_list[i] == div.innerHTML){
                ft_list.splice(i, 1);
            }
            i++;
        }
        var tocook = ft_list.join(';');
        var options = {};
        options.expires = 3600;
        deleteCookie('ft_list');
        setCookie('ft_list', tocook, options);
        div.innerHTML = '';
        div.remove();
    }
}

function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
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