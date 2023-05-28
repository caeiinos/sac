"use strict"

import Quill from "quill";

// quill js for binder
const QuillBinderIf = document.querySelector('#binder-quill');
if (QuillBinderIf) {
  var QuilBinder = new Quill('#binder-quill', {
    modules: {
      toolbar: [
        [{ header: [ 2,3,4, false] }],
        ['bold', 'italic', 'underline'],
        ['link', 'blockquote', 'code-block', 'image'],
        [{ list: 'ordered' }, { list: 'bullet' }]
      ]
    },
    placeholder: 'Compose an epic...',
    theme: 'snow'  // or 'bubble'
  });

  // store wysiwyg content in input at load for binder
  var QuillBinderValue = document.querySelector('input[name=binderdescription]');
  QuillBinderValue.value = QuilBinder.root.innerHTML.trim();    

  // store wysiwyg content in input on keyup for binder
  var QuillBinderwys = document.querySelector('#binder-quill');
  QuillBinderwys.addEventListener('DOMSubtreeModified', function() {

  let QuillBinderValue = document.querySelector('input[name=binderdescription]');
  QuillBinderValue.value = QuilBinder.root.innerHTML.trim();
        
  })

}

// quill js to update binder
const QuillBinderUIf = document.querySelector('#binder-update');
if (QuillBinderUIf) {
 var QuilBinderU = new Quill('#binder-update', {
  modules: {
    toolbar: [
      [{ header: [ 2,3,4, false] }],
      ['bold', 'italic', 'underline'],
      ['link', 'blockquote', 'code-block', 'image'],
      [{ list: 'ordered' }, { list: 'bullet' }]
    ]
  },
  placeholder: 'Compose an epic...',
  theme: 'snow'  // or 'bubble'
  });

  // store wysiwyg content in input at load for binder
  var QuillBinderUValue = document.querySelector('input[name=binderdescriptionupdate]');
  QuillBinderUValue.value = QuilBinderU.root.innerHTML.trim();

  // store wysiwyg content in input on keyup for binder
  var QuillBinderUwys = document.querySelector('#binder-update');
  QuillBinderUwys.addEventListener('DOMSubtreeModified', function() {

  let QuillBinderUValue = document.querySelector('input[name=binderdescriptionupdate]');
  QuillBinderUValue.value = QuilBinderU.root.innerHTML.trim();
        
  }) 
}


// quill js for note
const QuillNoteIf = document.querySelector('#documentnotes');
if (QuillNoteIf) {
  var QuillNote = new Quill('#documentnotes', {
      modules: {
        toolbar: [
          [{ header: [ 2,3,4, false] }],
          ['bold', 'italic', 'underline'],
          ['link', 'blockquote', 'code-block', 'image'],
          [{ list: 'ordered' }, { list: 'bullet' }]
        ]
      },
      placeholder: 'Compose an epic...',
      theme: 'snow'  // or 'bubble'
  });

  // store wysiwyg content in input at load for note
  var QuillValueKeeper = document.querySelector('input[name=doccontentonupdate]');
  QuillValueKeeper.value = QuillNote.root.innerHTML.trim();

  // store wysiwyg content in input on keyup for note
  var Quillwys = document.querySelector('#documentnotes');
  Quillwys.addEventListener('DOMSubtreeModified', function() {

    let QuillValueKeeper = document.querySelector('input[name=doccontentonupdate]');
    QuillValueKeeper.value = QuillNote.root.innerHTML.trim();
          
  })

}

// show add
const trigger = document.querySelectorAll('.form__trigger');
const form = document.querySelectorAll('.form');
const tofocus = document.querySelectorAll('.form__input--tofocus');

for (let i = 0; i < trigger.length; i++) {
  trigger[i].addEventListener("click", show);
  function show() {
    if (form[i].classList.contains('form--active')) {
      form[i].classList.remove('form--active');
    } else {
      form[i].classList.add('form--active');
      if (tofocus[i]) {
        tofocus[i].focus();
      }
    }
  }
}

// show note version
const versiontrigger = document.querySelectorAll('.version__trigger');
const versionoption = document.querySelectorAll('.version__list');

for (let i = 0; i < versiontrigger.length; i++) {
  versiontrigger[i].addEventListener("click", triggerversion);
  function triggerversion() {
    versionoption[i].classList.toggle('version__list--active')
  }
}

// show del form
const deltrigger = document.querySelectorAll('.delete__trigger');
const deloption = document.querySelectorAll('.delete');

for (let i = 0; i < deltrigger.length; i++) {
  deltrigger[i].addEventListener("click", triggerdel);
  function triggerdel() {
    deloption[i].classList.toggle('delete--active')
  }
}


// livesearch
var headerSearch = document.querySelector(".header__search");

if (headerSearch) {
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
}

// livesearch for project explorer

var projectSearch = document.querySelector(".explorer__search");

if (projectSearch) {
  projectSearch.addEventListener('keyup', function() {
      let str = this.value
        
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("explorersearch").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","components/livesearch/searchbinder.php?q="+str,true);
      xmlhttp.send();
  });
}


// livesearch for layers in binder

var binderlayerssearch = document.querySelector(".BinderLayer__search");
if (binderlayerssearch) {

  binderlayerssearch.addEventListener('keyup', function() {
      let activebinder = document.getElementById("layerbinder");
      let binderid = activebinder.value
      let oui = this.value
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("binderlayers").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","components/livesearch/layerinbinder.php?binderid="+binderid+"&q="+oui,true);
      xmlhttp.send();
  });  
}

// livesearch for chapters in layer

var layerchapterssearch = document.querySelector(".layerchapters__search");

if (layerchapterssearch) {
  layerchapterssearch.addEventListener('keyup', function() {
      let activelayer = document.getElementById("chapterlayer");
      let layerid = activelayer.value
      let layerchaptercontent = this.value
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("layerchapters").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","components/livesearch/chapinlayer.php?layerid="+layerid+"&q="+layerchaptercontent,true);
      xmlhttp.send();
  });  
}

// livesearch for documents in layer

var layerdocumentssearch = document.querySelector(".layerdocuments__search");

if (layerdocumentssearch) {
  layerdocumentssearch.addEventListener('keyup', function() {
      let activelayer = document.getElementById("documentlayer");
      let layerid = activelayer.value
      let layerdocumentscontent = this.value
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("layerdocuments").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","components/livesearch/docinlayer.php?layerid="+layerid+"&y="+layerdocumentscontent,true);
      xmlhttp.send();
  });  
}

// livesearch for documents in chapter

var chapterdocumentssearch = document.querySelector(".chapterdocuments__search");

if (chapterdocumentssearch) {
  chapterdocumentssearch.addEventListener('keyup', function() {
      let activechapter = document.getElementById("documentchapter");
      let chapterid = activechapter.value
      let chapterdocumentscontent = this.value
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("chapterdocuments").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","components/livesearch/docinchap.php?chapterid="+chapterid+"&y="+chapterdocumentscontent,true);
      xmlhttp.send();
  });  
}

// filter

var projectfilter = document.querySelector(".library__filter");

if (projectfilter) {
  projectfilter.addEventListener('change', function() {
    let choice = this.value

    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("tease--binder").innerHTML=this.responseText;
      }
    }
    xmlhttp.open("GET","components/filter/filter.php?k="+choice,true);
    xmlhttp.send();
  });  
}
