function detectBrowser(){
  // Opera 8.0+
  var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;

  // Firefox 1.0+
  var isFirefox = typeof InstallTrigger !== 'undefined';

  // Safari 3.0+ "[object HTMLElementConstructor]" 
  //var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification));

  // Internet Explorer 6-11
  //var isIE = /*@cc_on!@*/false || !!document.documentMode;

  // Edge 20+
  //var isEdge = !isIE && !!window.StyleMedia;

  // Chrome 1 - 71
  var isChrome = !!window.chrome && (!!window.chrome.webstore || !!window.chrome.runtime);

  // Blink engine detection
  //var isBlink = (isChrome || isOpera) && !!window.CSS;
  
  if (isFirefox){
    console.log('firefox?');
    return 'firefox';
  } 
  else if(isOpera){
    return 'opera';
  }
  else if (isChrome){
    return 'chrome';
  }
  else {
    return 'not supported';
  }
}


// Saves options to chrome.storage
function save_options() {
    if(detectBrowser() == 'chrome'){
      var bitrix_id = document.getElementById('bitrix').value;
      chrome.storage.sync.set({
        bitrixId: bitrix_id,
      }, function() {
        // Update status to let user know options were saved.
        var status = document.getElementById('status');
        status.textContent = 'Options saved.';
        setTimeout(function() {
          status.textContent = '';
        }, 750);
      });
    }
    else if(detectBrowser() == 'firefox'){
      var bitrix_id = document.getElementById('bitrix').value;
      browser.storage.sync.set({
        bitrixId: bitrix_id,
      }, function() {
        // Update status to let user know options were saved.
        var status = document.getElementById('status');
        status.textContent = 'Options saved.';
        setTimeout(function() {
          status.textContent = '';
        }, 750);
      });
      
    }
    else if(detectBrowser() == 'opera'){
      var bitrix_id = document.getElementById('bitrix').value;
      chrome.storage.sync.set({
        bitrixId: bitrix_id,
      }, function() {
        // Update status to let user know options were saved.
        var status = document.getElementById('status');
        status.textContent = 'Options saved.';
        setTimeout(function() {
          status.textContent = '';
        }, 750);
      });
    }

  }
  
  // Restores select box and checkbox state using the preferences
  // stored in chrome.storage.
  function restore_options() {
    if(detectBrowser() == 'chrome'){
      chrome.storage.sync.get({
          bitrixId: '000000',
      }, function(items) {
          console.log(items);
          document.getElementById('bitrix').value = items.bitrixId;
      });
    }
    else if(detectBrowser() == 'opera'){
      chrome.storage.sync.get({
          bitrixId: '000000',
      }, function(items) {
          console.log(items);
          document.getElementById('bitrix').value = items.bitrixId;
      });
    }
    else if(detectBrowser() == 'firefox'){
      var gettingItem = browser.storage.sync.get('bitrixId')
      gettingItem.then((items) => {
          console.log(items);
          document.getElementById('bitrix').value = items.bitrixId;
      });
    }
  }
  document.addEventListener('DOMContentLoaded', restore_options);
  document.getElementById('save').addEventListener('click',
      save_options);