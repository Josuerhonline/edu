										<?php use App\Models\CatalogosEvaluacion\preguntasViewModel;
										?>			
										<div id="step-1">

											<div class="item form-group col-md-11 " style=";text-align: center;" <?= !$created ? "hidden" : "" ?> >
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione una pregunta<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select style="width: 74%" class="form-control"  name="pregunta1" id="pregunta1" onchange ="valores()" >
														<center><option class="form-control" value="pregunta 1">< --- POR FAVOR SELECCIONE UNA OPCIÓN --- ></option></center>
														<?php $num=0; foreach ($preguntas as $p): ?>
														<option value="<?= $p->preguntaId ?>"><?= $num+=1, " - ", $p->pregunta ?></option>
													<?php endforeach?>
												</select> 
											</div>
										</div>
										<div class="item form-group col-md-11 "  <?= !$created ? "hidden" : "" ?> >
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tema de capacitación<span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-12">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="	fa fa-graduation-cap" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<div id="tema1"  style="width: 67%"></div>
											</div>
										</div>
									</div>

									<div id="step-2">
										<div class="item form-group col-md-11  "id="preg2"  style="display:none;text-align: center; ">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el área de evaluación<span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6" >
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<select style="width: 74%" class="form-control col-md-11"  name="pregunta2" id="pregunta2" onchange ="valores2()" >
													<option value="pregunta 2">< --- POR FAVOR SELECCIONE UNA OPCIÓN --- ></option>
													<?php $num=0; foreach ($preguntas as $p): ?>
													<option value="<?= $p->preguntaId ?>"><?= $num+=1, " - ", $p->pregunta ?></option>
												<?php endforeach?>
											</select> 
										</div>
									</div>
									<div class='input-group mb-3 col-md-6'>		
									</div>
									<div  id="tema2" class="col-md-11" ></div>
								</div>
								<div id="step-3">
									<div class="item form-group col-md-11  "id="preg3"  style="display:none;text-align: center; ">
										<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el área de evaluación<span class="required">*</span>
										</label>
										<div class="input-group mb-3 col-md-6" >
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
												"></i></span>
											</div>
											<select style="width: 74%" class="form-control col-md-11"  name="pregunta3" id="pregunta3" onchange ="valores3()" >
												<option value="pregunta 3">< --- POR FAVOR SELECCIONE UNA OPCIÓN --- ></option>
												<?php $num=0; foreach ($preguntas as $p): ?>
												<option value="<?= $p->preguntaId ?>"><?= $num+=1, " - ", $p->pregunta ?></option>
											<?php endforeach?>
										</select> 
									</div>
								</div>
								<div class='input-group mb-3 col-md-6'>		
								</div>
								<div  id="tema3" class="col-md-11" ></div>
							</div>
							<div id="step-4">
								<div class="item form-group col-md-11  " id="preg4"  style="display:none;text-align: center; ">
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el área de evaluación<span class="required">*</span>
									</label>
									<div class="input-group mb-3 col-md-6" >
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
											"></i></span>
										</div>
										<select style="width: 74%" class="form-control col-md-11"  name="pregunta4" id="pregunta4" onchange ="valores4()" >
											<option value="pregunta 4">< --- POR FAVOR SELECCIONE UNA OPCIÓN --- ></option>
											<?php $num=0; foreach ($preguntas as $p): ?>
											<option value="<?= $p->preguntaId ?>"><?= $num+=1, " - ", $p->pregunta ?></option>
										<?php endforeach?>
									</select> 
								</div>
							</div>
							<div class='input-group mb-3 col-md-6'>		
							</div>
							<div  id="tema4" class="col-md-11" ></div>
						</div>
						<div id="step-5">
							<div class="item form-group col-md-11  " id="preg5"  style="display:none;text-align: center; ">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el área de evaluación<span class="required">*</span>
								</label>
								<div class="input-group mb-3 col-md-6">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
										"></i></span>
									</div>
									<select style="width: 74%" class="form-control col-md-11"  name="pregunta5" id="pregunta5" onchange ="valores5()" >
										<option value="pregunta 5">< --- POR FAVOR SELECCIONE UNA OPCIÓN --- ></option>
										<?php $num=0; foreach ($preguntas as $p): ?>
										<option value="<?= $p->preguntaId ?>"><?= $num+=1, " - ", $p->pregunta ?></option>
									<?php endforeach?>
								</select> 
							</div>
						</div>
						<div class='input-group mb-3 col-md-6'>		
						</div>
						<div  id="tema5" class="col-md-11" ></div>
					</div>
					<div id="step-6">
						<div class="item form-group col-md-11  " id="preg6"  style="display:none;text-align: center; ">
							<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el área de evaluación<span class="required">*</span>
							</label>
							<div class="input-group mb-3 col-md-6">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
									"></i></span>
								</div>
								<select style="width: 74%" class="form-control col-md-11"  name="pregunta6" id="pregunta6" onchange ="valores6()" >
									<option value="pregunta 6">< --- POR FAVOR SELECCIONE UNA OPCIÓN --- ></option>
									<?php $num=0; foreach ($preguntas as $p): ?>
									<option value="<?= $p->preguntaId ?>"><?= $num+=1, " - ", $p->pregunta ?></option>
								<?php endforeach?>
							</select> 
						</div>
					</div>
					<div class='input-group mb-3 col-md-6'>		
					</div>
					<div  id="tema6" class="col-md-11" ></div>
				</div>
				<div id="step-7">
					<div class="item form-group col-md-11  " id="preg7"  style="display:none;text-align: center; " >
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el área de evaluación<span class="required">*</span>
						</label>
						<div class="input-group mb-3 col-md-6">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
								"></i></span>
							</div>
							<select style="width: 74%" class="form-control col-md-11"  name="pregunta7" id="pregunta7" onchange ="valores7()" >
								<option value="pregunta 7">< --- POR FAVOR SELECCIONE UNA OPCIÓN --- ></option>
								<?php $num=0; foreach ($preguntas as $p): ?>
								<option value="<?= $p->preguntaId ?>"><?= $num+=1, " - ", $p->pregunta ?></option>
							<?php endforeach?>
						</select> 
					</div>
				</div>
				<div class='input-group mb-3 col-md-6'>		
				</div>
				<div  id="tema7" class="col-md-11" ></div>
			</div>
			<div id="step-8">
				<div class="item form-group col-md-11  " id="preg8"  style="display:none;text-align: center; ">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el área de evaluación<span class="required">*</span>
					</label>
					<div class="input-group mb-3 col-md-6">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
							"></i></span>
						</div>
						<select style="width: 74%" class="form-control col-md-11"  name="pregunta8" id="pregunta8" onchange ="valores8()" >
							<option value="pregunta 8">< --- POR FAVOR SELECCIONE UNA OPCIÓN --- ></option>
							<?php $num=0; foreach ($preguntas as $p): ?>
							<option value="<?= $p->preguntaId ?>"><?= $num+=1, " - ", $p->pregunta ?></option>
						<?php endforeach?>
					</select> 
				</div>
			</div>
			<div class='input-group mb-3 col-md-6'>		
			</div>
			<div  id="tema8" class="col-md-11" ></div>
		</div>
		<div id="step-9">
			<div class="item form-group col-md-11  " id="preg9"  style="display:none;text-align: center; ">
				<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el área de evaluación<span class="required">*</span>
				</label>
				<div class="input-group mb-3 col-md-6">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
						"></i></span>
					</div>
					<select style="width: 74%" class="form-control col-md-11"  name="pregunta9" id="pregunta9" onchange ="valores9()" >
						<option value="pregunta 9">< --- POR FAVOR SELECCIONE UNA OPCIÓN --- ></option>
						<?php $num=0; foreach ($preguntas as $p): ?>
						<option value="<?= $p->preguntaId ?>"><?= $num+=1, " - ", $p->pregunta ?></option>
					<?php endforeach?>
				</select> 
			</div>
		</div>
		<div class='input-group mb-3 col-md-6'>		
		</div>
		<div  id="tema9" class="col-md-11" ></div>
	</div>
	<div id="step-10">
		<div class="item form-group col-md-11  " id="preg10"  style="display:none;text-align: center; " >
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el área de evaluación<span class="required">*</span>
			</label>
			<div class="input-group mb-3 col-md-6">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
					"></i></span>
				</div>
				<select style="width: 74%" class="form-control col-md-11"  name="pregunta10" id="pregunta10" onchange ="valores10()" >
					<option value="pregunta 10">< --- POR FAVOR SELECCIONE UNA OPCIÓN --- ></option>
					<?php $num=0; foreach ($preguntas as $p): ?>
					<option value="<?= $p->preguntaId ?>"><?= $num+=1, " - ", $p->pregunta ?></option>
				<?php endforeach?>
			</select> 
		</div>
	</div>
	<div class='input-group mb-3 col-md-6'>		
	</div>
	<div  id="tema10" class="col-md-11" ></div>
</div>
