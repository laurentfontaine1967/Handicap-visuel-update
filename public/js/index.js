
 
 $("#contrast").click(function(){   
  $("body").addClass('ajout')
  $(".comm").css({ "backgroundColor": "black", "color": "white" });
  $(".evt").css({ "backgroundColor": "black", "color": "white" });
  $(".biblio").css({ "backgroundColor": "black", "color": "white" });
  $("#introh").css({ "color": "white" });
  $(".card-title").css({ "color": "white" });
  $("body").removeClass('image')
  $("#contrast").hide();
  $(".lienbiblio").show();
  $(".lienbiblio1").hide();
  $("#return_view").show();

})


$("#return_view").click(function(){   
  $(".comm").css({ "backgroundColor": "#dad5ab","color": "black"});
  $(".evt").css({ "backgroundColor": "#feffe2","color": "black"});
  $(".biblio").css({ "backgroundColor": "#f0f0cb","color": "black" });
  $("body").removeClass('ajout')
  $("body").addClass('image')
  $("#return_view").hide();
  $("#contrast").show();
  $("#introh").css({ "color": "red" });
  $(".card-title").css({ "color": "red" });
  $("body").removeClass('image')
  $(".lienbiblio").hide();
  $(".lienbiblio1").show();



})



//I have determined the constant of some class function
 var li_items = document.querySelectorAll(".sidebar ul li");
var hamburger = document.querySelector(".hamburger");
var wrapper = document.querySelector(".wrapper");

//What will change if you move the mouse over the sidebar

li_items.forEach((li_item)=>{
	li_item.addEventListener("mouseenter", ()=>{


			li_item.closest(".wrapper").classList.remove("hover_collapse");
      //I have already added style information about hover_collapse

	})
  //In general, hover_collapse will be applied on the sidebar.

//Hover_collapse will be removed from the sidebar when the mouse is moved
})

li_items.forEach((li_item)=>{
	li_item.addEventListener("mouseleave", ()=>{

			li_item.closest(".wrapper").classList.add("hover_collapse");
      //Hover Collapse will be applied again when the mouse is removed

	})
})


//Now I will execute the menu button

//I have instructed here that hover_collapse will be applied and removed when the menu button is clicked.

//This means that the first click will be applied and the second click will be removed
hamburger.addEventListener("click", () => {

	hamburger.closest(".wrapper").classList.toggle("hover_collapse");
})
