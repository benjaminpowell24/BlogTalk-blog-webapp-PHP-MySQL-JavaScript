{
	let hello = document.querySelector(".hello");
	hello.addEventListener("click",function(){
	hello.classList.toggle("change");
	});

	
	let userList = document.querySelector(".test-list");
	let inputList = document.querySelector(".input-list");
	let addBtn = document.querySelector(".add-btn");
	addBtn.addEventListener("click", function(){
		let newList = document.createElement("li");
		let newText = document.createTextNode(inputList.value);
		newList.appendChild(newText);
		userList.appendChild(newList);
	});

}