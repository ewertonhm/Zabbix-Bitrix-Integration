

// Saves options to browser.storage
function save_options() {
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
  
  // Restores select box and checkbox state using the preferences
  // stored in browser.storage.
  function restore_options() {
      var gettingItem = browser.storage.sync.get('bitrixId')
      gettingItem.then((items) => {
          console.log(items);
          document.getElementById('bitrix').value = items.bitrixId;
      });
  
  }
  document.addEventListener('DOMContentLoaded', restore_options);
  document.getElementById('save').addEventListener('click',
      save_options);