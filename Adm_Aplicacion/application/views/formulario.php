<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('docentes', $attributes); ?>

<title> <?php echo $titulo?> </title>

<p>
        <label for="nombres">Nombres <span class="required">*</span></label>
        <?php echo form_error('nombres'); ?>
        <br /><input id="nombres" type="text" name="nombres" maxlength="255" value="<?php echo set_value('nombres'); ?>"  />
</p>

<p>
        <label for="apellidos">Apellidos <span class="required">*</span></label>
        <?php echo form_error('apellidos'); ?>
        <br /><input id="apellidos" type="text" name="apellidos" maxlength="255" value="<?php echo set_value('apellidos'); ?>"  />
</p>

<p>
        <label for="rut">RUT <span class="required">*</span></label>
        <?php echo form_error('rut'); ?>
        <br /><input id="rut" type="text" name="rut"  value="<?php echo set_value('rut'); ?>"  />
</p>

<p>
        <label for="fecha_de_nacimiento">Fecha de nacimiento <span class="required">*</span></label>
        <?php echo form_error('fecha_de_nacimiento'); ?>
        <br /><input id="fecha_de_nacimiento" type="text" name="fecha_de_nacimiento"  value="<?php echo set_value('fecha_de_nacimiento'); ?>"  />
</p>

<p>
        <label for="genero">Genero <span class="required">*</span></label>
        <?php echo form_error('genero'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
                                                  ''  => 'Seleccione una opcion',
                                                  'Masculino'    => 'M',
                                                  'Femenino'    => 'F',
                                                ); ?>

        <br /><?php echo form_dropdown('genero', $options, set_value('genero'))?>
</p> 

<p>
        <label for="telefono">Telefono <span >*</span></label>
        <?php echo form_error('telefono'); ?>
        <br /><input id="telefono" type="text" name="telefono"  value="<?php echo set_value('telefono'); ?>"  />
</p>

<p>
        <label for="celular">Celular <span class="required">*</span></label>
        <?php echo form_error('celular'); ?>
        <br /><input id="celular" type="text" name="celular"  value="<?php echo set_value('celular'); ?>"  />
</p>                        

<p>
        <label for="email">Email <span class="required">*</span></label>
        <?php echo form_error('email'); ?>
        <br /><input id="email" type="text" name="email"  value="<?php echo set_value('email'); ?>"  />
</p>  

<p>
        <label for="jerarquia">Jerarquia Academica <span class="required">*</span></label>
        <?php echo form_error('jerarquia'); ?>
        <br /><input id="jerarquia" type="text" name="jerarquia"  value="<?php echo set_value('jerarquia'); ?>"  />
</p>  

<p>
        <label for="contrato">Contrato <span class="required">*</span></label>
        <?php echo form_error('contrato'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
                                                  ''  => 'Seleccione una opcion',
                                                  'Planta'    => 'Planta',
                                                  'PartTime'    => 'PartTime',
                                                ); ?>

        <br /><?php echo form_dropdown('contrato', $options, set_value('contrato'))?>
</p> 

<p>
        <label for="jornada">Jornada <span class="required">*</span></label>
        <?php echo form_error('jornada'); ?>
        <br /><input id="jornada" type="text" name="jornada"  value="<?php echo set_value('jornada'); ?>"  />
</p>  

<p>
        <label for="grado">Grado <span class="required">*</span></label>
        <?php echo form_error('grado'); ?>
        <br /><input id="grado" type="text" name="grado"  value="<?php echo set_value('grado'); ?>"  />
</p>
<p>
        <label for="funcion">Funcion <span class="required">*</span></label>
        <?php echo form_error('funcion'); ?>
        <br /><input id="funcion" type="text" name="funcion"  value="<?php echo set_value('funcion'); ?>"  />
</p>  

<p>
        <?php echo form_submit( 'submit', 'Guardar'); ?>
</p>

<?php echo form_close(); ?>