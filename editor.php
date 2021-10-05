
<div class="editorContainer  hide " >
<div class="editorsubcontainer">

<!-- Existing  Compose Update -->

<?php
	if (isset($_GET['alter'])) {
	$composeId = $_GET['alter'];
	$query = "SELECT * FROM `composes` WHERE `composeId` = '$composeId'";
	$query = mysqli_query($GLOBALS['conn'], $query);
	$row = mysqli_fetch_assoc($query);

?>

	<form action="./backend.map.php?update=<?php echo $composeId ?>" method="POST" onsubmit="divToInputTransfer()">
		<div class="editors" >
		<input type="text" name="composeTitle" value="<?php echo $row['composeTitle'] ?>">
		<textarea class="shortDiscription" name="composeDescription"><?php echo $row['composeDescription'] ?></textarea>
		<div class="editor" style="border: none; box-shadow: none; width: 100%;"><?php echo $row['composeBody'] ?></div>
		<input type="text" id="inputEditor" style="display: none;" name="composeBody">
		<span class="composeAuthor">Author: <input type="text" class="author" name="composeAuthor" style="box-shadow: none; font-size: 1rem; font-weight: 400; width: 55%;" value="<?php echo $row['composeAuthor'] ?>"></span> 

		</div>
		<div class="screenToggel">
		<p  onclick="toggle('.editorContainer')">Cancel</p>
		<button type="submit" class="publish" name="composeAlter">Update</button>
		</div>
	</form>

	<script type="text/javascript">toggle('.editorContainer'); </script>

<?php

} else {
	?>
	<!-- New Compose Create -->
	<form action="./backend.map.php" method="POST" onsubmit="divToInputTransfer()">
		<div class="editors" >
		<input type="text" name="composeTitle" value="Title">
		<textarea class="shortDiscription" name="composeDescription">Short Summary</textarea>
		<div class="editor" style="border: none; box-shadow: none; width: 100%;">Body</div>
		<input type="text" id="inputEditor" style="display: none;" name="composeBody">
		<span class="composeAuthor">Author: <input type="text" class="author" name="composeAuthor" style="box-shadow: none; font-size: 1rem; font-weight: 400; width: 55%;" value="<?php echo user("name") ?>"></span> 

		</div>
		<div class="screenToggel">
		<p  onclick="toggle('.editorContainer')">Cancel</p>
		<button type="submit" class="publish" name="compose"> Publish</button>
		</div>
	</form>
<?php
}
?>

</div>
</div>




<script>

	function divToInputTransfer( ){
		let input = document.querySelector(".editor").innerHTML;
		let inputEditor = document.querySelector("#inputEditor");
		inputEditor.value = input;
	}

</script>
	
<script src="./JS/ckeditor.js"></script>

	<script>BalloonEditor
				.create( document.querySelector( '.editor' ), {
					
				toolbar: {
					items: [
						'heading',
						'code',
						'|',
						'bold',
						'italic',
						'underline',
						'|',
						'blockQuote',
						'link',
						'undo',
						'redo'
					]
				},
				language: 'en',
					licenseKey: '',
					
					
					
				} )
				.then( editor => {
					window.editor = editor;
			
					
					
					
				} )
				.catch( error => {
					console.error( 'Oops, something went wrong!' );

				} );
		</script>