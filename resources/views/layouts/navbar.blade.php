	<!-- [ navigation menu ] start -->
	<nav class="pc-sidebar ">
		<div class="navbar-wrapper">
			<div class="m-header">
				<a href="index.html" class="b-brand">
					<!-- ========   change your logo hear   ============ -->
					<img src="{{ asset('assets/images/logo.svg') }}" alt="" class="logo logo-lg">
					<img src="{{ asset('assets/images/logo-sm.svg') }}"  alt="" class="logo logo-sm">
				</a>
			</div>
			<div class="navbar-content">
				<ul class="pc-navbar">
					<li class="pc-item pc-caption">
						<label>Menu</label>

					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="home"></i></span><span class="pc-mtext">Dashboard</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
					</li>
					<li class="pc-item">
						<a href="{{ route('admin.levels.index') }}" class="pc-link"><span class="pc-micon"><i data-feather="layers"></i></span><span class="pc-mtext">Levels</span></a>
					</li>
					<li class="pc-item">
						<a href="{{ route('admin.classes.index') }}" class="pc-link">
							<span class="pc-micon"><i class="nav-icon fas fa-school"></i></span>
							<span class="pc-mtext">Classes</span>
						</a>
					</li>
					<li class="pc-item">
						<a href="{{ route('admin.subjects.index') }}" class="pc-link">
							<span class="pc-micon"><i class="nav-icon fas fa-book"></i></span>
							<span class="pc-mtext">Subjects</span>
						</a>
					</li>
					<li class="pc-item pc-hasmenu {{ Request::is('admin/users*') ? 'active pc-trigger' : '' }}">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="user"></i></span><span class="pc-mtext">User</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="user-profile.html">Profile</a></li>
							<li class="pc-item"><a class="pc-link" href="user-profile-social.html">Social Profile</a></li>
							<li class="pc-item"><a class="pc-link" href="user-card.html">User Card</a></li>
							<li class="pc-item {{ Request::is('admin/users*') ? 'active' : '' }}"><a class="pc-link" href="{{ route('admin.users.index') }}">User List</a></li>
						</ul>
					</li>
					<li class="pc-item pc-caption">
						<label>Admin Panel</label>
						<span>7+ Admin Panel Demos</span>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link"><span class="pc-micon"><i data-feather="activity"></i></span><span class="pc-mtext">Hospital</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="hospital-dashboard.html">Dashboard</a></li>
							<li class="pc-item"><a class="pc-link" href="hospital-department.html">Department</a></li>
							<li class="pc-item"><a class="pc-link" href="hospital-doctor.html">Doctor</a></li>
							<li class="pc-item"><a class="pc-link" href="hospital-patient.html">Patient</a></li>
							<li class="pc-item"><a class="pc-link" href="hospital-nurse.html">Nurse</a></li>
							<li class="pc-item"><a class="pc-link" href="hospital-pharmacist.html">Pharmacist</a></li>
							<li class="pc-item"><a class="pc-link" href="hospital-laboratorie.html">Laboratory</a></li>
						</ul>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="user-check"></i></span><span class="pc-mtext">Membership</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="member-dashboard.html">Dashboard</a></li>
							<li class="pc-item"><a class="pc-link" href="member-mail-template.html">Email templates</a></li>
							<li class="pc-item"><a class="pc-link" href="member-countries.html">Country</a></li>
							<li class="pc-item"><a class="pc-link" href="member-coupons.html">Coupons</a></li>
							<li class="pc-item"><a class="pc-link" href="member-newsletter.html">Newsletter</a></li>
							<li class="pc-item"><a class="pc-link" href="member-user.html">User</a></li>
							<li class="pc-item"><a class="pc-link" href="member-membership.html">Membership</a></li>
						</ul>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="life-buoy"></i></span><span class="pc-mtext">Helpdesk</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="help-dashboard.html">Helpdesk dashboard</a></li>
							<li class="pc-item"><a class="pc-link" href="help-create-ticket.html">Create ticket</a></li>
							<li class="pc-item"><a class="pc-link" href="help-ticket.html">ticket list</a></li>
							<li class="pc-item"><a class="pc-link" href="help-ticket-details.html">ticket Details</a></li>
							<li class="pc-item"><a class="pc-link" href="help-customer.html">Customer</a></li>
						</ul>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="book"></i></span><span class="pc-mtext">School</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="school-dashboard.html">Dashboard</a></li>
							<li class="pc-item"><a class="pc-link" href="school-student.html">Student</a></li>
							<li class="pc-item"><a class="pc-link" href="school-parents.html">Parents</a></li>
							<li class="pc-item"><a class="pc-link" href="school-teacher.html">Teacher</a></li>
						</ul>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link" data-toggle="tooltip" title="Student Information System"><span class="pc-micon"><i data-feather="user"></i></span><span class="pc-mtext">SIS</span><span class="pc-arrow"><i
									data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="sis-dashboard.html">Dashboard</a></li>
							<li class="pc-item"><a class="pc-link" href="sis-leave.html">Leave</a></li>
							<li class="pc-item"><a class="pc-link" href="sis-evaluation.html">Evaluation</a></li>
							<li class="pc-item"><a class="pc-link" href="sis-event.html">Event</a></li>
							<li class="pc-item"><a class="pc-link" href="sis-circular.html">Circular</a></li>
							<li class="pc-item"><a class="pc-link" href="sis-course.html">Course</a></li>
						</ul>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link"><span class="pc-micon"><i data-feather="target"></i></span><span class="pc-mtext">Crypto</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="crypto-dashboard.html">Dashboard</a></li>
							<li class="pc-item"><a class="pc-link" href="crypto-exchange.html">Exchange</a></li>
							<li class="pc-item"><a class="pc-link" href="crypto-wallet.html">Wallet</a></li>
							<li class="pc-item"><a class="pc-link" href="crypto-transactions.html">Transactions</a></li>
							<li class="pc-item"><a class="pc-link" href="crypto-history.html">History</a></li>
							<li class="pc-item"><a class="pc-link" href="crypto-trading.html">Trading</a></li>
							<li class="pc-item"><a class="pc-link" href="crypto-initial-coin.html">Initial coin</a></li>
							<li class="pc-item"><a class="pc-link" href="crypto-ico-listing.html">Ico listing</a></li>
						</ul>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link"><span class="pc-micon"><i data-feather="shopping-cart"></i></span><span class="pc-mtext">E-Commerce</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="ecom-product.html">Product</a></li>
							<li class="pc-item"><a class="pc-link" href="ecom-product-details.html">Product details</a></li>
							<li class="pc-item"><a class="pc-link" href="ecom-order.html">Order</a></li>
							<li class="pc-item"><a class="pc-link" href="ecom-checkout.html">Checkout</a></li>
							<li class="pc-item"><a class="pc-link" href="ecom-cart.html">Shopping Cart</a></li>
							<li class="pc-item"><a class="pc-link" href="ecom-customers.html">Customers</a></li>
							<li class="pc-item"><a class="pc-link" href="ecom-sellers.html">Sellers</a></li>
						</ul>
					</li>
					<li class="pc-item pc-caption">
						<label>Elements</label>
						<span>UI Components</span>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="box"></i></span><span class="pc-mtext">Basic</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="bc_alert.html">Alert</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_button.html">Button</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_badges.html">Badges</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_breadcrumb-pagination.html">Breadcrumb & paggination</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_card.html">Cards</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_collapse.html">Collapse</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_carousel.html">Carousel</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_grid.html">Grid system</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_progress.html">Progress</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_modal.html">Modal</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_spinner.html">Spinner</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_tabs.html">Tabs & pills</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_typography.html">Typography</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_tooltip-popover.html">Tooltip & popovers</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_toasts.html">Toasts</a></li>
							<li class="pc-item"><a class="pc-link" href="bc_extra.html">Other</a></li>
						</ul>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="gitlab"></i></span><span class="pc-mtext">Advance</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="ac_alert.html">Sweet alert</a></li>
							<li class="pc-item"><a class="pc-link" href="ac-datepicker-componant.html">Datepicker</a></li>
							<li class="pc-item"><a class="pc-link" href="ac_lightbox.html">Lightbox</a></li>
							<li class="pc-item"><a class="pc-link" href="ac_notification.html">Notification</a></li>
							<li class="pc-item"><a class="pc-link" href="ac_pnotify.html">Pnotify</a></li>
							<li class="pc-item"><a class="pc-link" href="ac_rating.html">Rating</a></li>
							<li class="pc-item"><a class="pc-link" href="ac_rangeslider.html">Rangeslider</a></li>
							<li class="pc-item"><a class="pc-link" href="ac_syntax_highlighter.html">Syntax highlighter</a></li>
						</ul>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="feather"></i></span><span class="pc-mtext">Icons</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="icon-feather.html">Feather</a></li>
							<!-- <li class="pc-item"><a class="pc-link" href="icon-fontawsome-dual.html">Font Awesome<span class="pc-badge badge badge-info">Dualtone</span></a></li> -->
							<li class="pc-item"><a class="pc-link" href="icon-fontawsome.html">Font Awesome 5</a></li>
						</ul>
					</li>
					<li class="pc-item pc-caption">
						<label>Forms</label>
						<span>40+ Ready to Use From plugins</span>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="layout"></i></span><span class="pc-mtext">Forms Elements</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="form_elements.html">Form Basic</a></li>
							<li class="pc-item"><a class="pc-link" href="form2_basic.html">Form Options</a></li>
							<li class="pc-item"><a class="pc-link" href="form2_input_group.html">Input Groups</a></li>
							<li class="pc-item"><a class="pc-link" href="form2_checkbox.html">Checkbox</a></li>
							<li class="pc-item"><a class="pc-link" href="form2_radio.html">Radio</a></li>
							<li class="pc-item"><a class="pc-link" href="form2_switch.html">Switch</a></li>
							<li class="pc-item"><a class="pc-link" href="form2_megaoption.html">Mega option</a></li>
						</ul>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="file-plus"></i></span><span class="pc-mtext">Forms Plugins</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item pc-hasmenu">
								<a class="pc-link" href="#">Date<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
								<ul class="pc-submenu">
									<li class="pc-item"><a class="pc-link" href="form2_datepicker.html">Datepicker</a></li>
									<li class="pc-item"><a class="pc-link" href="form2_daterangepicker.html">Date Range Picker</a></li>
									<li class="pc-item"><a class="pc-link" href="form2_timepicker.html">Timepicker</a></li>
								</ul>
							</li>
							<li class="pc-item pc-hasmenu">
								<a class="pc-link" href="#">Select<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
								<ul class="pc-submenu">
									<li class="pc-item"><a class="pc-link" href="form2_multipleselectsplitter.html">Multiple Select Splitter</a></li>
									<li class="pc-item"><a class="pc-link" href="form2_select.html">Select</a></li>
									<li class="pc-item"><a class="pc-link" href="form2_select2.html">Select2</a></li>
								</ul>
							</li>
							<li class="pc-item"><a class="pc-link" href="form2_recaptcha.html">Google reCaptcha</a></li>
							<li class="pc-item"><a class="pc-link" href="form2_inputmask.html">Input Masks</a></li>
							<li class="pc-item"><a class="pc-link" href="form2_rangeslider.html">Range Slider</a></li>
						</ul>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="edit"></i></span><span class="pc-mtext">Text Editors</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="editor-classic.html">CK editor</a></li>
							<li class="pc-item"><a class="pc-link" href="editor-trumbowyg.html">Trumbowyg editor</a></li>
						</ul>
					</li>
					<li class="pc-item">
						<a href="form-validation.html" class="pc-link "><span class="pc-micon"><i data-feather="check-circle"></i></span><span class="pc-mtext">Form Validation</span></a>
					</li>
					<li class="pc-item"><a href="file-upload.html" class="pc-link "><span class="pc-micon"><i data-feather="upload-cloud"></i></span><span class="pc-mtext">File upload</span></a></li>
					<li class="pc-item"><a href="image_crop.html" class="pc-link "><span class="pc-micon"><i data-feather="scissors"></i></span><span class="pc-mtext">Image cropper</span></a></li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i class="icon feather icon-more-horizontal-"></i></span><span class="pc-mtext">Form Wizard</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="form-wizard.html">Wizard</a></li>
							<li class="pc-item"><a class="pc-link" href="page-wizard1.html">Wizard 1</a></li>
							<li class="pc-item"><a class="pc-link" href="page-wizard2.html">Wizard 2</a></li>
						</ul>
					</li>
					<li class="pc-item pc-caption">
						<label>table</label>
						<span>Advance Datatable Integrated</span>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="grid"></i></span><span class="pc-mtext">Bootstrap table</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="tbl_bootstrap.html">Basic table</a></li>
							<li class="pc-item"><a class="pc-link" href="tbl_sizing.html">Sizing table</a></li>
							<li class="pc-item"><a class="pc-link" href="tbl_border.html">Border table</a></li>
							<li class="pc-item"><a class="pc-link" href="tbl_styling.html">Styling table</a></li>
						</ul>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="grid"></i></span><span class="pc-mtext">Data table</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="dt_basic.html">Basic initialization</a></li>
							<li class="pc-item"><a class="pc-link" href="dt_advance.html">Advance initialization</a></li>
							<li class="pc-item"><a class="pc-link" href="dt_styling.html">Styling</a></li>
							<li class="pc-item"><a class="pc-link" href="dt_api.html">API</a></li>
							<li class="pc-item"><a class="pc-link" href="dt_plugin.html">Plug-in</a></li>
							<li class="pc-item"><a class="pc-link" href="dt_sources.html">Data sources</a></li>
						</ul>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="server"></i></span><span class="pc-mtext">DT extensions</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="dt_ext_autofill.html">Autofill</a></li>
							<li class="pc-item pc-hasmenu">
								<a href="#!" class="pc-link "><span class="pc-mtext">Button</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
								<ul class="pc-submenu">
									<li class="pc-item"><a class="pc-link" href="dt_ext_basic_buttons.html">Basic button</a></li>
									<li class="pc-item"><a class="pc-link" href="dt_ext_export_buttons.html">Data export</a></li>
								</ul>
							</li>
							<li class="pc-item"><a class="pc-link" href="dt_ext_col_reorder.html">Col reorder</a></li>
							<li class="pc-item"><a class="pc-link" href="dt_ext_fixed_columns.html">Fixed columns</a></li>
							<li class="pc-item"><a class="pc-link" href="dt_ext_fixed_header.html">Fixed header</a></li>
							<li class="pc-item"><a class="pc-link" href="dt_ext_key_table.html">Key table</a></li>
							<li class="pc-item"><a class="pc-link" href="dt_ext_responsive.html">Responsive</a></li>
							<li class="pc-item"><a class="pc-link" href="dt_ext_row_reorder.html">Row reorder</a></li>
							<li class="pc-item"><a class="pc-link" href="dt_ext_scroller.html">Scroller</a></li>
							<li class="pc-item"><a class="pc-link" href="dt_ext_select.html">Select table</a></li>
						</ul>
					</li>
					<li class="pc-item pc-caption">
						<label>Chart & Maps</label>
						<span>Tones of readymade charts</span>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="pie-chart"></i></span><span class="pc-mtext">Chart</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="chart-apex.html">Apex Chart</a></li>
							<li class="pc-item"><a class="pc-link" href="chart-chartjs.html">Chart js</a></li>
							<li class="pc-item"><a class="pc-link" href="chart-highchart.html">Highchart</a></li>
							<li class="pc-item"><a class="pc-link" href="chart-knob.html">Knob</a></li>
							<li class="pc-item"><a class="pc-link" href="chart-peity.html">Peity</a></li>
						</ul>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="map"></i></span><span class="pc-mtext">Maps</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="map-google.html">Google</a></li>
							<li class="pc-item"><a class="pc-link" href="map-api.html">Gmap search API</a></li>
						</ul>
					</li>
					<li class="pc-item pc-caption">
						<label>Pages</label>
						<span>15+ Redymade Pages</span>
					</li>
					<li class="pc-item"><a href="landing.html" class="pc-link "><span class="pc-micon"><i data-feather="airplay"></i></span><span class="pc-mtext">Landing</span></a></li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link"><span class="pc-micon"><i data-feather="lock"></i></span><span class="pc-mtext">Authentication</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="auth-signup.html" target="_blank">Sign up</a></li>
							<li class="pc-item"><a class="pc-link" href="auth-signup-img-side.html" target="_blank">Sign up v2</a></li>
							<li class="pc-item"><a class="pc-link" href="auth-signup-3.html" target="_blank">Sign up v3</a></li>
							<li class="pc-item"><a class="pc-link" href="auth-signin.html" target="_blank">Sign in</a></li>
							<li class="pc-item"><a class="pc-link" href="auth-signin-img-side.html" target="_blank">Sign in v2</a></li>
							<li class="pc-item"><a class="pc-link" href="auth-signin-3.html" target="_blank">Sign in v3</a></li>
							<li class="pc-item"><a class="pc-link" href="auth-reset-password.html" target="_blank">Reset password</a></li>
							<li class="pc-item"><a class="pc-link" href="auth-reset-password-img-side.html" target="_blank">Reset password v2</a></li>
							<li class="pc-item"><a class="pc-link" href="auth-reset-password-3.html" target="_blank">Reset password v3</a></li>
							<li class="pc-item"><a class="pc-link" href="auth-change-password.html" target="_blank">Change password</a></li>
							<li class="pc-item"><a class="pc-link" href="auth-change-password-img-side.html" target="_blank">Change password v2</a></li>
							<li class="pc-item"><a class="pc-link" href="auth-change-password-3.html" target="_blank">Change password v3</a></li>
							<li class="pc-item"><a class="pc-link" href="auth-profile-settings.html" target="_blank">Profile settings</a></li>
							<li class="pc-item"><a class="pc-link" href="auth-tabs.html" target="_blank">Tabs Authentication</a></li>
							<li class="pc-item"><a class="pc-link" href="auth-lockscreen.html" target="_blank">Lockscreen</a></li>
						</ul>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="sliders"></i></span><span class="pc-mtext">Maintenance</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="maint-error.html">Error</a></li>
							<li class="pc-item"><a class="pc-link" href="maint-offline-ui.html" target="_blank">Offline UI</a></li>
							<li class="pc-item"><a class="pc-link" href="maint-maintance.html" target="_blank">Maintenance</a></li>
						</ul>
					</li>
					<li class="pc-item pc-caption">
						<label>App</label>
						<span>Creative application design</span>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="mail"></i></span><span class="pc-mtext">Email</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="email_inbox.html">Inbox</a></li>
							<li class="pc-item"><a class="pc-link" href="email_read.html">Read mail</a></li>
							<li class="pc-item"><a class="pc-link" href="email_compose.html">Compose mail</a></li>
						</ul>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="clipboard"></i></span><span class="pc-mtext">Task</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="task-list.html">List</a></li>
							<li class="pc-item"><a class="pc-link" href="task-board.html">Board</a></li>
							<li class="pc-item"><a class="pc-link" href="task-detail.html">Detail</a></li>
						</ul>
					</li>
					<li class="pc-item">
						<a href="todo.html" class="pc-link "><span class="pc-micon"><i data-feather="check-square"></i></span><span class="pc-mtext">To-Do</span></a>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="image"></i></span><span class="pc-mtext">Gallery</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="gallery-grid.html">Grid</a></li>
							<li class="pc-item"><a class="pc-link" href="gallery-masonry.html">Masonry</a></li>
						</ul>
					</li>
					<li class="pc-item pc-caption">
						<label>Extension</label>
						<span>fabulous Extension Page</span>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="headphones"></i></span><span class="pc-mtext">Faq</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="page-faq.html">Faq 1</a></li>
							<li class="pc-item"><a class="pc-link" href="page-faq2.html">Faq 2</a></li>
							<li class="pc-item pc-hasmenu">
								<a class="pc-link" href="#!">Faq 3<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
								<ul class="pc-submenu">
									<li class="pc-item"><a class="pc-link" href="page-faq3.html">view</a></li>
									<li class="pc-item"><a class="pc-link" href="page-faq3-category.html">Category</a></li>
									<li class="pc-item"><a class="pc-link" href="page-faq3-details.html">Details</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="dollar-sign"></i></span><span class="pc-mtext">Invoice</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="page-invoice.html">Invoice</a></li>
							<li class="pc-item"><a class="pc-link" href="page-invoice-summary.html">Invoice Summary</a></li>
							<li class="pc-item"><a class="pc-link" href="page-invoice-list.html">Invoice List</a></li>
						</ul>
					</li>

					<li class="pc-item"><a href="full-calendar.html" class="pc-link "><span class="pc-micon"><i data-feather="calendar"></i></span><span class="pc-mtext">Full calendar</span></a></li>
					<li class="pc-item pc-caption">
						<label>Other</label>
						<span>Extra more things</span>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link"><span class="pc-micon"><i data-feather="menu"></i></span><span class="pc-mtext">Menu levels</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="#!">Menu Level 2.1</a></li>
							<li class="pc-item pc-hasmenu">
								<a href="#!" class="pc-link">Menu level 2.2<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
								<ul class="pc-submenu">
									<li class="pc-item"><a class="pc-link" href="#!">Menu level 3.1</a></li>
									<li class="pc-item"><a class="pc-link" href="#!">Menu level 3.2</a></li>
								</ul>
							</li>
							<li class="pc-item pc-hasmenu">
							<li class="pc-item pc-hasmenu">
								<a href="#!" class="pc-link">Menu level 2.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
								<ul class="pc-submenu">
									<li class="pc-item"><a class="pc-link" href="#!">Menu level 3.1</a></li>
									<li class="pc-item"><a class="pc-link" href="#!">Menu level 3.2</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="pc-item disabled"><a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="power"></i></span><span class="pc-mtext">Disabled menu</span></a></li>
					<li class="pc-item"><a href="sample-page.html" class="pc-link "><span class="pc-micon"><i data-feather="sidebar"></i></span><span class="pc-mtext">Sample page</span></a></li>

				</ul>
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->