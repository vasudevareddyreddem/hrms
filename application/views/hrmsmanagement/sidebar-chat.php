<style>

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; 	
  background-color: #f6f6f6;
  padding: 5px;
  text-decoration: none;
  font-size: 16px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>
<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div class="sidebar-menu">
						<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

						<ul id="myUL">
						  <li><a href="#">Adele</a></li>
						  <li><a href="#">Agnes</a></li>

						  <li><a href="#">Billy</a></li>
						  <li><a href="#">Bob</a></li>

						  <li><a href="#">Calvin</a></li>
						  <li><a href="#">Christina</a></li>
						  <li><a href="#">Cindy</a></li>
							<li><a href="#">Adele</a></li>
						  <li><a href="#">Agnes</a></li>

						  <li><a href="#">Billy</a></li>
						  <li><a href="#">Bob</a></li>

						  <li><a href="#">Calvin</a></li>
						  <li><a href="#">Christina</a></li>
						  <li><a href="#">Cindy</a></li>
						</ul>
					</div>
                </div>
            </div>
<script>
function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
