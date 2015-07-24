<!-- 
This Sidebar is displayed on each page, to save space and file sizes this code is called from a PHP script
-->

<div id="sidebar">
	<!-- Search -->
	<div class="box search">
		<h2>Search by <span></span></h2>
		<div class="box-content">
			<form action="http://hopper.wlu.ca/~ramr0560/final/searchbooks.php" method="post">
				<label>Title Keyword</label>
				<input name="bookname" type="text" class="field" />
				<label>Author Keyword</label>
				<input name="author" type="text" class="field" />
				<label>Course</label>
				<select name ="course" class="field">
					<option value="">-- Select Course --</option>
					<?php
						$conn=mysql_connect("localhost","ramr0560","xxxxx") or die(mysql_error());
						mysql_select_db("ramr0560");

						$sql="SELECT distinct course FROM Books ORDER By course ASC";
						$result = mysql_query($sql,$conn);

						while($data = mysql_fetch_array($result)) {
							echo '<option value="'.$data['course'].'">'.$data['course'].'</option>';
						}
						mysql_close($conn);
					?>
				</select>
				<div class="inline-field">
					<label>Set Max Price Limit</label>
					<select name="price" class="field small-field">
						<option value=0>$0</option>
						<option value=20>$20</option>
						<option value=40>$40</option>
						<option value=60>$60</option>
						<option value=80>$80</option>
						<option value=100>$100</option>
						<option value=150>$150</option>
						<option value=9999 selected="selected">No Limit</option>
					</select>
				</div>
				<input type="submit" class="search-submit" value="Search" />
			</form>
		</div>

	</div>
	<!-- End Search -->
	<!-- Categories -->
	<div class="box categories">
		<h2>Recent Additions<span></span></h2>
		<div class="box-content">
			<ul>
			<?php
				$line_array = file("recent.txt");
				$i = 0;
				if (count($line_array) > 13) {
					$i = 13;
				} else {
					$i = count($line_array);
				}
				$i = count($line_array);
				$count  = 0 ;
				$line = 0;
				while ($count < 13) {
					
					if ($line_array[$i+1-$line] == ''){
						$line = $line + 1;
						continue;
					}
					echo '<li><a href="http://hopper.wlu.ca/~ramr0560/final/searchbooks.php?bookname='.$line_array[$i+1-$line].'">'.$line_array[$i+1-$line] .'</a></li>';
					$count = $count + 1;
					$line = $line + 1;
				}
			?>
			</ul>
		</div>
	</div>
	<!-- End Categories -->	
</div>
