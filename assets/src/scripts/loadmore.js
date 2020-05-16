/* Ajax functions */
const postdivcs = document.getElementById('my-postscs'),
    loadmorecs = document.getElementById('loadmorecs');

// $(document).on('click','.loadmore', function(){
loadmorecs.addEventListener('click',(c) => {

	// var that = $(this);
	// var page = $(this).data('page');
  var page = loadmorecs.dataset.page;
	var newPage = page+1;
  var ajaxurl = loadmorecs.dataset.url;
	// var ajaxurl = that.data('url');
    // const ajaxurl = "<?php echo admin_url( '/admin-ajax.php' ); ?>";

	// $.ajax({
	// 	url : ajaxurl,
	// 	type : 'post',
	// 	data : {
	// 		page : page,
	// 		action: 'bka2018_load_more'
	// 	},
	// 	error : function( response ){
	// 		console.log(response);
	// 	},
	// 	success : function( response ){
  //
	// 		that.data('page', newPage);
  //     console.log(newPage);
	// 		// $('#my-postscs').append( response );
	// 	}
	// });
  fetch(ajaxurl, {
    method: "POST",
    page: 'page',
    action: 'bka2018_load_more'
  })
  .then(result => result.json())
  .catch(error => {

  })
  .then(response => {
    console.log('output is here');
  })
});
// // append more posts
//   const postdivcs = document.getElementById('my-postscs'),
//       loadmorecs = document.getElementById('loadmorecs');
//
//   const ajaxurl = "<?php echo admin_url( '/admin-ajax.php' ); ?>";
//   // var page = 2;
//
//   loadmorecs.addEventListener('click',(c) => {
//     var page = loadmorecs.dataset.page;
//       console.log('pressed</br>',page);
//     // console.log(page);
//     // try {
//     //   const fetchResult =
//       fetch(ajaxurl, {
//         method: "POST",
//         // body: params
//         page: page,
//         action: 'bka2018_load_more'
//       })
//       .then(result => result.json())
//       .catch(error => {
//
//       })
//       .then(response => {
//         console.log(response.message);
//         // postdivcs.innerHTML = response.message;
//       })
//     // } catch (e) {
//     //
//     // } finally {
//     //
//     // }
//
//
//     // var para = document.createElement("P");
//     // var t = document.createTextNode("This is a paragraph.");
//     // para.appendChild(t);
//     // postdivcs.appendChild(para);
//
//     var data = {
//         action : 'load_posts_by_ajax',
//         page : page,
//         security : '<?php echo wp_create_nonce("load_more_posts"); ?>'
//     };
//     // document.ajax({
//     //   url:ajaxurl,
//     //   data:data
//     // },
//     // error: function(response) {
//     //   console.log(response);
//     // },
//     // success: function(response){
//     //   postdivcs.append(response);
//     // });
//   });
