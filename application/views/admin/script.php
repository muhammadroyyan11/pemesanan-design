<!-- <?= $this->uri->segment(2) ?> -->

<?php if ($this->uri->segment(2) != 'chat_index') { ?>


	<script src="<?= base_url() ?>assets/scripts/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/scripts/modernizr.min.js"></script>
	<script src="<?= base_url() ?>assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/plugin/nprogress/nprogress.js"></script>
	<!-- <script src="<?= base_url() ?>assets/plugin/sweet-alert/sweetalert.min.js"></script> -->
	<script src="<?= base_url() ?>assets/plugin/waves/waves.min.js"></script>

	<script src="<?= base_url() ?>assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>

	<script src="<?= base_url() ?>print_js/print.min.js"></script>



	<script src="<?= base_url() ?>assets/plugin/toastr/toastr.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugin/toastr/toastr.css">


	<script src="<?php echo base_url() ?>sweet-alert/sweetalert.js"></script>
	<!-- <script src="<?= base_url('public/chat/chat.js'); ?>"></script> -->


<?php } else { ?>

	<!-- jQuery 3 -->
	<script src="<?= base_url('public') ?>/components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?= base_url('public') ?>/components/bootstrap/dist/js/bootstrap.min.js"></script>
	<?php if ($this->uri->segment(1) != 'chat') { ?>
		<script src="<?= base_url('public') ?>/components/PACE/pace.min.js"></script>
	<?php } ?>
	<!-- SlimScroll -->
	<script src="<?= base_url('public') ?>/components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?= base_url('public') ?>/components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('public') ?>/dist/js/adminlte.min.js"></script>
	<script src="<?= base_url() ?>assets/plugin/nprogress/nprogress.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?= base_url('public') ?>/dist/js/demo.js"></script>
	<script>
		<?php if ($this->uri->segment(1) != 'chat') { ?>
			$(document).ajaxStart(function() {
				Pace.restart();
			});
		<?php } ?>
	</script>

	<script>
		$(function() {
			var receiver_id = '1';

			ChatSection(1);
			// var receiver_id = $(this).attr('id');
			var receiver_id = '1';
			//alert(receiver_id);
			$('#ReciverId_txt').val(receiver_id);
			$('#ReciverName_txt').html('Admin');
			// console.log()	;
			GetChatHistory(receiver_id);
			// console.log(receiver_id);
			$('.message').keypress(function(event) {
				var keycode = (event.keyCode ? event.keyCode : event.which);
				if (keycode == '13') {
					sendTxtMessage($(this).val());
				}
			});
			$('.btnSend').click(function() {
				sendTxtMessage($('.message').val());
			});
			$('.selectVendor').click(function() {
				ChatSection(1);
				// var receiver_id = $(this).attr('id');
				var receiver_id = '1';
				//alert(receiver_id);
				$('#ReciverId_txt').val(receiver_id);
				$('#ReciverName_txt').html($(this).attr('title'));

				GetChatHistory(receiver_id);

			});
			$('.upload_attachmentfile').change(function() {

				DisplayMessage('<div class="spiner"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
				ScrollDown();

				var file_data = $('.upload_attachmentfile').prop('files')[0];
				var receiver_id = $('#ReciverId_txt').val();
				var form_data = new FormData();
				form_data.append('attachmentfile', file_data);
				form_data.append('type', 'Attachment');
				form_data.append('receiver_id', receiver_id);

				$.ajax({
					url: 'chat-attachment/upload',
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,
					type: 'post',
					success: function(response) {

						$('.upload_attachmentfile').val('');
						GetChatHistory(receiver_id);
					},
					error: function(jqXHR, status, err) {
						// alert('Local error callback');
					}
				});

			});
			$('.ClearChat').click(function() {
				var receiver_id = $('#ReciverId_txt').val();
				$.ajax({
					//dataType : "json",
					url: 'chat-clear?receiver_id=' + receiver_id,
					success: function(data) {
						GetChatHistory(receiver_id);
					},
					error: function(jqXHR, status, err) {
						// alert('Local error callback');
					}
				});

			});



		}); ///end of jquery

		function ViewAttachment(message_id) {
			//alert(message_id);
			/*$.ajax({
						  //dataType : "json",
							  url: 'view-chat-attachment?message_id='+message_id,
						  success:function(data)
						  {
											 
						  },
						  error: function (jqXHR, status, err) {
								 // alert('Local error callback');
						  }
						});*/
		}

		function ViewAttachmentImage(image_url, imageTitle) {
			$('#modelTitle').html(imageTitle);
			$('#modalImgs').attr('src', image_url);
			$('#myModalImg').modal('show');
		}

		function ChatSection(status) {
			//chatSection
			if (status == 0) {
				$('#chatSection :input').attr('disabled', true);
			} else {
				$('#chatSection :input').removeAttr('disabled');
			}
		}
		ChatSection(0);


		function ScrollDown() {
			var elmnt = document.getElementById("content");
			var h = elmnt.scrollHeight;
			$('#content').animate({
				scrollTop: h
			}, 1000);
		}
		window.onload = ScrollDown();

		function DisplayMessage(message) {
			var Sender_Name = $('#Sender_Name').val();
			var Sender_ProfilePic = $('#Sender_ProfilePic').val();

			var str = '<div class="direct-chat-msg right">';
			str += '<div class="direct-chat-info clearfix">';
			str += '<span class="direct-chat-name pull-right">' + Sender_Name;
			str += '</span><span class="direct-chat-timestamp pull-left"></span>'; //23 Jan 2:05 pm
			str += '</div><img class="direct-chat-img" src="' + Sender_ProfilePic + '" alt="">';
			str += '<div class="direct-chat-text">' + message;
			str += '</div></div>';
			$('#dumppy').append(str);
		}

		function sendTxtMessage(message) {
			var messageTxt = message.trim();
			if (messageTxt != '') {
				//console.log(message);
				DisplayMessage(messageTxt);

				var receiver_id = $('#ReciverId_txt').val();
				$.ajax({
					dataType: "json",
					type: 'post',
					data: {
						messageTxt: messageTxt,
						receiver_id: receiver_id
					},
					url: 'send-message',
					success: function(data) {
						GetChatHistory(receiver_id)
					},
					error: function(jqXHR, status, err) {
						// alert('Local error callback');
					}
				});



				ScrollDown();
				$('.message').val('');
				$('.message').focus();
			} else {
				$('.message').focus();
			}
		}

		function GetChatHistory(receiver_id) {
			$.ajax({
				//dataType : "json",
				url: 'get-chat-history-vendor?receiver_id=' + receiver_id,
				success: function(data) {
					$('#dumppy').html(data);
					ScrollDown();
				},
				error: function(jqXHR, status, err) {
					alert('Local error callback');
				}
			});
		}

		setInterval(function() {
			var receiver_id = $('#ReciverId_txt').val();
			if (receiver_id != '') {
				GetChatHistory(receiver_id);
			}
		}, 3000);
	</script>

<?php } ?>

<!-- CHAT ASSETS  -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/chat/js/message/main.js"></script> -->



<?php if ($this->session->flashdata('success')) : ?>
	<script type="text/javascript">
		toastr.options = {
			"closeButton": true,
			"debug": false,
			"progressBar": true,
			"positionClass": "toast-top-right",
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		};


		toastr.success("<?php echo  $this->session->flashdata('success') ?>");
	</script>
<?php endif ?>

<?php if ($this->session->flashdata('error')) : ?>
	<script type="text/javascript">
		toastr.options = {
			"closeButton": true,
			"debug": false,
			"progressBar": true,
			"positionClass": "toast-top-right",
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		};


		toastr.error("<?php echo  $this->session->flashdata('error') ?>");
	</script>
<?php endif ?>


<?php if ($this->uri->segment(2) == '' or $this->uri->segment(2) == null) : ?>
	<script type="text/javascript">
		var elem = document.getElementById("num");

		elem.addEventListener("keydown", function(event) {
			var key = event.which;
			if ((key < 48 || key > 57) && key != 8) event.preventDefault();
		});

		elem.addEventListener("keyup", function(event) {
			var value = this.value.replace(/,/g, "");
			this.dataset.currentValue = parseInt(value);
			var caret = value.length - 1;
			while ((caret - 3) > -1) {
				caret -= 3;
				value = value.split('');
				value.splice(caret + 1, 0, ",");
				value = value.join('');
			}
			this.value = value;
		});
	</script>

	<script type="text/javascript">
		function previewImage() {
			document.getElementById("image-preview").style.display = "block";
			var oFReader = new FileReader();
			oFReader.readAsDataURL(document.getElementById("imagesource").files[0]);

			oFReader.onload = function(oFREvent) {
				document.getElementById("image-preview").src = oFREvent.target.result;
			};
		};
	</script>

	<script type="text/javascript">
		function changeKategori() {
			var selectBox = document.getElementById("kategori");
			var selectedValue = selectBox.options[selectBox.selectedIndex].value;
			if (selectedValue == 1) {
				$("#jenis_undangan").show();
			} else {
				$("#jenis_undangan").hide();
			}

		}

		function tambah() {

			var file = document.getElementById('imagesource').files[0];
			if (document.myform.imagesource.value == "") {
				toastr.options = {
					"closeButton": true,
					"debug": false,
					"progressBar": true,
					"positionClass": "toast-top-right",
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};


				toastr.error("Foto Harus Dipilih");
				document.myform.imagesource.focus();
			} else if (file && file.size > 1800000) {
				toastr.options = {
					"closeButton": true,
					"debug": false,
					"progressBar": true,
					"positionClass": "toast-top-right",
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};


				toastr.error("Saiz Foto Maksimal 1.5 Mb");
				document.myform.imagesource.focus();
			} else if (document.myform.kategori.value == "") {
				toastr.options = {
					"closeButton": true,
					"debug": false,
					"progressBar": true,
					"positionClass": "toast-top-right",
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};


				toastr.error("Kolum Kategori Harus Dipilih");
				document.myform.kategori.focus();
			} else if (document.myform.kategori.value == 1) {
				if (document.myform.undangan.value == "") {
					toastr.options = {
						"closeButton": true,
						"debug": false,
						"progressBar": true,
						"positionClass": "toast-top-right",
						"showDuration": "300",
						"hideDuration": "1000",
						"timeOut": "5000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					};


					toastr.error("Kolum Jenis Undangan Harus Dipilih");
					document.myform.undangan.focus();
				} else if ($("input[name=harga]").val() == '' || $("input[name=harga]").val() == null) {
					toastr.options = {
						"closeButton": true,
						"debug": false,
						"progressBar": true,
						"positionClass": "toast-top-right",
						"showDuration": "300",
						"hideDuration": "1000",
						"timeOut": "5000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					};


					toastr.error("Kolum Harga Harus Terisi");
					$("input[name=harga]").focus();
				} else {
					$('form#myform').submit();
				}
			} else if ($("input[name=harga]").val() == '' || $("input[name=harga]").val() == null) {
				toastr.options = {
					"closeButton": true,
					"debug": false,
					"progressBar": true,
					"positionClass": "toast-top-right",
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};


				toastr.error("Kolum Harga Harus Terisi");
				$("input[name=harga]").focus();
			} else {
				$('form#myform').submit();
			}



		}
	</script>

	<script>
		function openCity(evt, cityName) {
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			document.getElementById(cityName).style.display = "block";
			evt.currentTarget.className += " active";
		}

		document.getElementById("defaultOpen").click();
	</script>

	<script type="text/javascript">
		function tukar_halaman(a, b) {
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>admin/tukar_halaman/",
				data: {
					no: a,
					kategori: b
				}, // appears as $_GET['id'] @ your backend side
				// dataType: "json",
				success: function(data1) {
					if (b == 1) {
						$("#undangan_tabs").html(data1);
					} else if (b == 2) {
						$("#kartu_nama_tabs").html(data1);
					} else if (b == 3) {
						$("#spanduk_tabs").html(data1);
					}
				}
			});
		}
	</script>
<?php endif ?>

<?php if ($this->uri->segment(2) == 'detail') : ?>
	<script>
		$(document).ready(function() {
			$('#tabel-data').DataTable({
				"aLengthMenu": [
					[10, 20, 30, 40, -1],
					[10, 20, 30, 40, "All"]
				],
				"iDisplayLength": 10,
				// "pageLength": 5,
				"searching": false,
				"paging": true,
				"ordering": true,
				"info": false,

			});

		});
	</script>

	<?php if ($this->uri->segment(4) == '') : ?>
		<script type="text/javascript">
			function hapus_nya() {
				// console.log('hehehe');
				swal({
						title: "Yakin Ingin Menghapus Desain Ini?",
						text: "Desain, Pembelian Pelanggan Yang Membeli Produk Ini Akan Terhapus",
						icon: "error",
						buttons: true,
						dangerMode: true,
					})
					.then((logout) => {
						if (logout) {
							$('#hapus_button').click();
						} else {}
					});
			}
		</script>
	<?php elseif ($this->uri->segment(4) == 'edit') : ?>

		<script type="text/javascript">
			function klik_foto(e) {
				// console.log(e);
				if (e == 1) {
					console.log("kekalkan")
					$("#sini_upload_foto_div").hide();
					$("#sini_foto_lama_div").show();
					$("#imagesource11").removeAttr('requrired');
					// document.getElementById("imagesource").value = null;
				} else if (e == 2) {
					$("#imagesource11").attr({
						"required": ''
					});
					console.log("tukar")
					$("#sini_upload_foto_div").show();
					$("#sini_foto_lama_div").hide();
				}
			}
		</script>



		<script type="text/javascript">
			var elem = document.getElementById("num");

			elem.addEventListener("keydown", function(event) {
				var key = event.which;
				if ((key < 48 || key > 57) && key != 8) event.preventDefault();
			});

			elem.addEventListener("keyup", function(event) {
				var value = this.value.replace(/,/g, "");
				this.dataset.currentValue = parseInt(value);
				var caret = value.length - 1;
				while ((caret - 3) > -1) {
					caret -= 3;
					value = value.split('');
					value.splice(caret + 1, 0, ",");
					value = value.join('');
				}
				this.value = value;
			});
		</script>

		<script type="text/javascript">
			function previewImage() {
				document.getElementById("image-preview").style.display = "block";
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("imagesource11").files[0]);

				oFReader.onload = function(oFREvent) {
					document.getElementById("image-preview").src = oFREvent.target.result;
				};
			};
		</script>

		<script type="text/javascript">
			function changeKategori() {
				var selectBox = document.getElementById("kategori");
				var selectedValue = selectBox.options[selectBox.selectedIndex].value;
				if (selectedValue == 1) {
					$("#jenis_undangan").show();
				} else {
					$("#jenis_undangan").hide();
				}

			}

			function edit() {

				if (document.myform.kategori.value == "") {
					toastr.options = {
						"closeButton": true,
						"debug": false,
						"progressBar": true,
						"positionClass": "toast-top-right",
						"showDuration": "300",
						"hideDuration": "1000",
						"timeOut": "5000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					};


					toastr.error("Kolum Kategori Harus Dipilih");
					document.myform.kategori.focus();
				} else if (document.myform.kategori.value == 1) {
					if (document.myform.undangan.value == "") {
						toastr.options = {
							"closeButton": true,
							"debug": false,
							"progressBar": true,
							"positionClass": "toast-top-right",
							"showDuration": "300",
							"hideDuration": "1000",
							"timeOut": "5000",
							"extendedTimeOut": "1000",
							"showEasing": "swing",
							"hideEasing": "linear",
							"showMethod": "fadeIn",
							"hideMethod": "fadeOut"
						};


						toastr.error("Kolum Jenis Undangan Harus Dipilih");
						document.myform.undangan.focus();
					} else if ($("input[name=harga]").val() == '' || $("input[name=harga]").val() == null) {
						toastr.options = {
							"closeButton": true,
							"debug": false,
							"progressBar": true,
							"positionClass": "toast-top-right",
							"showDuration": "300",
							"hideDuration": "1000",
							"timeOut": "5000",
							"extendedTimeOut": "1000",
							"showEasing": "swing",
							"hideEasing": "linear",
							"showMethod": "fadeIn",
							"hideMethod": "fadeOut"
						};


						toastr.error("Kolum Harga Harus Terisi");
						$("input[name=harga]").focus();
					} else {
						// $('form#myform').submit();
						$('#ini_submit').click();
						// alert('nah lakukkan la');
					}
				} else if ($("input[name=harga]").val() == '' || $("input[name=harga]").val() == null) {
					toastr.options = {
						"closeButton": true,
						"debug": false,
						"progressBar": true,
						"positionClass": "toast-top-right",
						"showDuration": "300",
						"hideDuration": "1000",
						"timeOut": "5000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					};


					toastr.error("Kolum Harga Harus Terisi");
					$("input[name=harga]").focus();
				} else {
					// $('form#myform').submit();
					$('#ini_submit').click();
					// alert('nah lakukkan la');
				}



			}
		</script>
	<?php endif ?>
<?php endif ?>


<?php if ($this->uri->segment(2) == 'daftar_tunggu') : ?>
	<script>
		$(document).ready(function() {
			$('#tabel-data').DataTable({
				"aLengthMenu": [
					[10, 20, 30, 40, -1],
					[10, 20, 30, 40, "All"]
				],
				"iDisplayLength": 10,
				// "pageLength": 5,
				"searching": true,
				"paging": true,
				"ordering": true,
				"info": true,

			});

		});
	</script>

	<?php if (is_numeric($this->uri->segment(3))) : ?>
		<script src="<?= base_url() ?>/dist/js/lightbox-plus-jquery.min.js"></script>
	<?php elseif ($this->uri->segment(3) == 'tanggalnya') : ?>
		<script type="text/javascript">
			function PrintElem(elem) {
				var mywindow = window.open('', 'PRINT', 'height=400,width=600');

				mywindow.document.write('<html><head><title>' + document.title + '</title>');
				mywindow.document.write('</head><body ><div id="wrapper"><div class="main-content">');
				mywindow.document.write('<h1>' + document.title + '</h1>');
				mywindow.document.write(document.getElementById('sini').innerHTML);
				mywindow.document.write('</div></div></body></html>');

				mywindow.document.close(); // necessary for IE >= 10
				mywindow.focus(); // necessary for IE >= 10*/

				mywindow.print();
				mywindow.close();

				return true;
			}
		</script>
	<?php endif ?>
<?php endif ?>

<?php if ($this->uri->segment(2) == 'proses_pembuatan') : ?>

	<script>
		$(document).ready(function() {
			$('#tabel-data').DataTable({
				"aLengthMenu": [
					[10, 20, 30, 40, -1],
					[10, 20, 30, 40, "All"]
				],
				"iDisplayLength": 10,
				// "pageLength": 5,
				"searching": true,
				"paging": true,
				"ordering": true,
				"info": true,

			});

		});
	</script>

	<script type="text/javascript">
		function previewImage() {
			document.getElementById("image-preview").style.display = "block";
			var oFReader = new FileReader();
			oFReader.readAsDataURL(document.getElementById("imagesource").files[0]);

			oFReader.onload = function(oFREvent) {
				document.getElementById("image-preview").src = oFREvent.target.result;
			};
		};
	</script>

	<script type="text/javascript">
		function upload() {
			var file_data = $('#imagesource').prop('files')[0];
			var form_data = new FormData();
			form_data.append('file', file_data);
			// console.log(form_data);

			if (document.getElementById('imagesource').value == "") {
				toastr.options = {
					"closeButton": true,
					"debug": false,
					"progressBar": true,
					"positionClass": "toast-top-right",
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};


				toastr.error("Foto Harus Dipilih");
				document.getElementById('imagesource').focus();
			} else if (file_data && file_data.size > 1800000) {
				toastr.options = {
					"closeButton": true,
					"debug": false,
					"progressBar": true,
					"positionClass": "toast-top-right",
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};


				toastr.error("Saiz Foto Maksimal 1.5 Mb");
				document.getElementById('imagesource').focus();
			} else {
				var file = document.getElementById('imagesource').files[0];
				var le = file_data['name'].length;
				var poin = file_data['name'].lastIndexOf(".");
				var accu1 = file_data['name'].substring(poin, le);
				var accu = accu1.toLowerCase();
				// console.log(accu);

				if (accu == '.png' || accu == '.jpg') {
					// console.log(accu);
					$.ajax({
						cache: false,
						contentType: false,
						processData: false,
						type: "post",
						url: "<?= base_url() ?>admin/proses_pembuatan/upload_foto_transaksi/<?= $this->uri->segment(3) ?>",
						data: form_data,
						// data: {foto : file}, // appears as $_GET['id'] @ your backend side
						// dataType: "html",
						success: function(data1) {
							window.location.replace("<?= base_url() ?>admin/proses_pembuatan/");
							console.log(data1);
						}

					});
				} else {
					toastr.options = {
						"closeButton": true,
						"debug": false,
						"progressBar": true,
						"positionClass": "toast-top-right",
						"showDuration": "300",
						"hideDuration": "1000",
						"timeOut": "5000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					};


					toastr.error("Ekstensi Foto Harus .png atau .jpg");
					document.getElementById('imagesource').focus();
				}

			}
		}
	</script>

	<?php if (is_numeric($this->uri->segment(3))) : ?>
		<script src="<?= base_url() ?>/dist/js/lightbox-plus-jquery.min.js"></script>
	<?php endif ?>
<?php endif ?>

<?php if ($this->uri->segment(2) == 'daftar_pengembalian') : ?>
	<script>
		$(document).ready(function() {
			$('#tabel-data').DataTable({
				"aLengthMenu": [
					[10, 20, 30, 40, -1],
					[10, 20, 30, 40, "All"]
				],
				"iDisplayLength": 10,
				// "pageLength": 5,
				"searching": true,
				"paging": true,
				"ordering": true,
				"info": true,

			});

		});
	</script>
	<?php if (is_numeric($this->uri->segment(3))) : ?>
		<script src="<?= base_url() ?>/dist/js/lightbox-plus-jquery.min.js"></script>
	<?php endif ?>
<?php endif ?>

<?php if ($this->uri->segment(2) == 'daftar_pembelian') : ?>
	<script>
		$(document).ready(function() {
			$('#tabel-data').DataTable({
				"aLengthMenu": [
					[10, 20, 30, 40, -1],
					[10, 20, 30, 40, "All"]
				],
				"iDisplayLength": 10,
				// "pageLength": 5,
				"searching": true,
				"paging": true,
				"ordering": true,
				"info": true,

			});

		});
	</script>
<?php endif ?>

<?php if ($this->uri->segment(2) == 'daftar_pembeli') : ?>
	<script>
		$(document).ready(function() {
			$('#tabel-data').DataTable({
				"aLengthMenu": [
					[10, 20, 30, 40, -1],
					[10, 20, 30, 40, "All"]
				],
				"iDisplayLength": 10,
				// "pageLength": 5,
				"searching": true,
				"paging": true,
				"ordering": true,
				"info": true,

			});

		});
	</script>
<?php endif ?>


<?php if ($this->uri->segment(2) == 'laporan') : ?>
	<script>
		$(document).ready(function() {
			$('#tabel-data').DataTable();
		});
	</script>

	<?php if ($this->uri->segment(3) == 'tanggalnya') : ?>
		<script type="text/javascript">
			function PrintElem() {
				var mywindow = window.open('', 'PRINT', 'height=400,width=600');


				$.ajax({
					type: "post",
					url: "<?= base_url() ?>admin/laporan/cetak",
					data: {
						bulan: '<?= $this->uri->segment(4) ?>',
						tahun: '<?= $this->uri->segment(5) ?>'
					}, // appears as $_GET['id'] @ your backend side
					// dataType: "json",
					success: function(data1) {
						mywindow.document.write('<html><head><title>' + document.title + '</title>');
						mywindow.document.write('</head><body >');
						mywindow.document.write('<h4 style="text-align:center">' + document.title + '</h4>');
						mywindow.document.write('<div style="text-align:center">' + data1 + '</div');
						mywindow.document.write('</body></html>');

						mywindow.document.close(); // necessary for IE >= 10
						mywindow.focus(); // necessary for IE >= 10*/

						mywindow.print();
						mywindow.close();
						// console.log(data1);
					}
				});


				return true;
			}
		</script>
	<?php endif ?>
<?php endif ?>

<?php if ($this->uri->segment(2) == 'rekening') : ?>
	<script>
		$(document).ready(function() {
			$('#tabel-data').DataTable();
		});
	</script>

	<script type="text/javascript">
		function setInputFilter(textbox, inputFilter) {
			["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
				textbox.addEventListener(event, function() {
					if (inputFilter(this.value)) {
						this.oldValue = this.value;
						this.oldSelectionStart = this.selectionStart;
						this.oldSelectionEnd = this.selectionEnd;
					} else if (this.hasOwnProperty("oldValue")) {
						this.value = this.oldValue;
						this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
					} else {
						this.value = "";
					}
				});
			});
		}



		setInputFilter(document.getElementById("nomor"), function(value) {
			return /^-?\d*$/.test(value);
		});
	</script>

	<?php if ($this->uri->segment(3) == '') : ?>
		<script type="text/javascript">
			function tambah() {
				swal({
						title: "Tambah Rekening Baru?",
						text: "Rekening Akan Ditambah Sesuai Inputan Yang Dimasukkan",
						icon: "info",
						buttons: true,
						dangerMode: true,
					})
					.then((logout) => {
						if (logout) {
							$('#submit_form').click();
						} else {}
					});
			}
		</script>
	<?php elseif (is_numeric($this->uri->segment(3))) : ?>
		<script type="text/javascript">
			function edit() {
				$('#jenis').removeAttr('disabled');
				$('#nama').removeAttr('disabled');
				$('#nomor').removeAttr('disabled');

				$('#jenis_bank').prop('required', true);
				$('#nama').prop('required', true);
				$('#nomor').prop('required', true);
				$('#edit_button').hide();
				$('#edit_button_true').show();
			}

			function cancel() {
				window.location.reload();
			}

			function edit_true() {
				swal({
						title: "Edit Rekening?",
						text: "Rekening Akan Berubah Sesuai Inputan Yang Dimasukkan",
						icon: "info",
						buttons: true,
						dangerMode: true,
					})
					.then((logout) => {
						if (logout) {
							$('#submit_form').click();
						} else {}
					});
			}
		</script>
	<?php endif ?>
<?php endif ?>


<script src="<?= base_url() ?>assets/scripts/main.min.js"></script>