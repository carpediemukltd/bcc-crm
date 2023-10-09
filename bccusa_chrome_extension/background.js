chrome.runtime.onMessage.addListener(function(message, sender, sendResponse) {
    if (message === "openComposeModal") {
      chrome.tabs.executeScript(sender.tab.id, {
        file: "gmail.js"
      });
    }
  });
  