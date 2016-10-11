
			<div id="footer">Copyright <?php echo date("Y")?>, joshcruz.net</div>
		</div>
	</body>
</html>
<?php 
  // 5. Close database connection
if (isset($conn)) {
	$conn->close();
}

?>