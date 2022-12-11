var triggerTabList = [].slice.call(document.querySelectorAll('#pills-tab a'))
triggerTabList.forEach(function (triggerEl) {
  var tabTrigger = new bootstrap.Tab(triggerEl)

  triggerEl.addEventListener('click', function (event) {
    event.preventDefault()
    tabTrigger.show()
  })
})

window.addEventListener("DOMContentLoaded", function() {

		// get the form elements defined in your form HTML above
		
		var form = document.getElementById("my-form");
		var status_1 = document.getElementById("status_1");
		var status_2 = document.getElementById("status_2");
		var close_1 = document.getElementById("click_to_close_1");
		var close_2 = document.getElementById("click_to_close_2");

	
		// Success and Error functions for after the form is submitted
		
		function success() {
			form.reset();
			 status_1.classList.add('active');
		}
	
		function error() {
			status_2.classList.add('active');
		}

		close_1.onclick = function(){
			status_1.classList.remove('active');
		}

		close_2.onclick = function(){
			status_2.classList.remove('active');
		}

		
	
		// handle the form submission event
	
		form.addEventListener("submit", function(ev) {
		  ev.preventDefault();
		  var data = new FormData(form);
		  ajax(form.method, form.action, data, success, error);
		});
	  });
	  
	  // helper function for sending an AJAX request
	
	  function ajax(method, url, data, success, error) {
		var xhr = new XMLHttpRequest();
		xhr.open(method, url);
		xhr.setRequestHeader("Accept", "application/json");
		xhr.onreadystatechange = function() {
		  if (xhr.readyState !== XMLHttpRequest.DONE) return;
		  if (xhr.status === 200) {
			success(xhr.response, xhr.responseType);
		  } else {
			error(xhr.status, xhr.response, xhr.responseType);
		  }
		};
		xhr.send(data);
	  }


	 