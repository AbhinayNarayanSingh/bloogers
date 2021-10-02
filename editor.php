

<div class="editorContainer hide  " >
    
    <div class="editorsubcontainer">
            <form action="">

            <div class="screenToggel">
				<p  onclick="toggle('.editorContainer')">Cancel</p>
                <button type="submit" class="publish"> Publish</button>
            </div>


            <div class="editors" >
                
                <input type="text">

                <div class="editor" style="border: none; box-shadow: none;">
                   <textarea type="text" name="" id="" class=".article-content"></textarea>
                </div>
                
            </div>
        </form>
    </div>
</div>










  
	
<script src="./js/ckeditor.js"></script>
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
					console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
					console.warn( 'Build id: lxibsa6r6whr-bfla6p3zmjg9' );
					console.error( error );
				} );
		</script>