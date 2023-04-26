"use strict"

// show add

const trigger = document.querySelectorAll('.aside__trigger');
const form = document.querySelectorAll('.aside__addform');
const submit = document.querySelectorAll('.aside__addsubmit');

for (let i = 0; i < trigger.length; i++) {
  trigger[i].addEventListener("click", show);
  function show() {
    if (form[i].classList.contains('aside__addform--active')) {
      form[i].classList.remove('aside__addform--active');
    } else {
      form[i].classList.add('aside__addform--active');
    }
  }
}

for (let i = 0; i < submit.length; i++) {
  submit[i].addEventListener("click", deshow);
  function deshow() {
    form[i].classList.add('aside__addform--active');
  }
}

// livesearch

var headerSearch = document.querySelector(".header__search");

headerSearch.addEventListener('keyup', function() {
    let str = this.value

    if (str.length==0) {
        document.getElementById("livesearch").innerHTML="";
        return;
      }

      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("livesearch").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","components/livesearch/livesearch.php?q="+str,true);
      xmlhttp.send();
});

// livesearch for project explorer

var projectSearch = document.querySelector(".explorer__search");

projectSearch.addEventListener('keyup', function() {
    let str = this.value
      
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("explorersearch").innerHTML=this.responseText;
      }
    }
    xmlhttp.open("GET","components/livesearch/explorersearch.php?q="+str,true);
    xmlhttp.send();
});

var projectfilter = document.querySelector(".tease__filter");

projectfilter.addEventListener('change', function() {
    let choice = this.value

    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("tease--project").innerHTML=this.responseText;
      }
    }
    xmlhttp.open("GET","components/filter/filter.php?k="+choice,true);
    xmlhttp.send();
  });