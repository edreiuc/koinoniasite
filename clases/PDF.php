<?php
    require_once('medoo.php');
    $database = new medoo();
    $vistas = $database->select("vistaconsulta", "*",["id_consulta_prueba" => $_POST['idConsultaPrueb']]);
    $vista=$vistas[0];
    $idprueba=$vista['id_prueba'];
    $views = $database->select("vistaresultado", "*",[ "AND" => ["id_prueba"=> $idprueba], "ORDER" => "vistaresultado.position ASCE"]);
    $view=$views[0];
?>
<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
}
-->
</style>
<page backcolor="#FEFEFE"  backtop="0" backbottom="30mm" footer="date;heure;page" style="font-size: 12pt">
    <bookmark title="Lettre" level="0" ></bookmark>
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
        <tr>
            <td style="width: 80%;">
            </td>
            <td style="width: 20%; color: #444444;">
                <img style="width: 50%;" src="admin/assets/ico/boo-logo.png" alt="Logo"><br>
                Laboratorio v0.1
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
            <td style="width:50%;"></td>
            <td style="width:14%; ">Paciente :</td>
            <td style="width:36%"><?php echo $vista['nombre_paciente'].' '.$vista['apellido_paciente']; ?></td>
        </tr>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:14%; ">Doctor :</td>
            <td style="width:36%"><?php echo $vista['nombre_doctor'].' '.$vista['apellido_doctor']; ?></td>
        </tr>
    </table>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left;font-size: 10pt">
        <tr>
            <td style="width:50%;"></td>
            <td style="width:50%; ">Merida, Yucatan a <?php echo date('d/m/Y'); ?></td>
        </tr>
    </table>
    <br>
    <i>
        <b><u>Asunto </u>: &laquo; Resultados analisis &raquo;</b><br>
        <?php echo $vista['nombre_prueba']; ?><br>
    </i>
    <br>
    <br>
    Diagnostico :<br>
    <br>
    <br>
    <?php echo $vista['diagnostico']; ?>.<br>
    <br>
    <table cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;">
        <tr>
            <th style="width: 40%">Parametro</th>
            <th style="width: 30%">Valor</th>
            <th style="width: 30%">Unidad de medida</th>
        </tr>
    </table>
    <?php 
        foreach ($views  as $formu)
        {
            echo' <table cellspacing="0" style="width: 100%; border: solid 1px black; background: #F7F7F7; text-align: center; font-size: 10pt;">  <tr>
            <td style="width: 40%; text-align: center">
            <label class="intitle">'.$formu['name'].': </label>
            </td>';
            $values = $database->select("form_field_value", "*",["AND" => ["id_consulta_prueba" => $formu['id_consulta_prueba'], "id_form_field" => $formu['id_form_field'] ]]);
            foreach ($values as $val) {
            echo'<td style="width: 30%; text-align: center">
            <label class="control-label">'.$val['value'].'</label>
            </td>';
            }
            echo' <td style="width: 30%; text-align: center"><label>'.$formu['unidad'].'</label></td>
            </tr></table>' ;
        }                              
    ?>    
    <br>
    <nobreak>
        <br>
        En caso de dudas o preguntas localizenos por medio de los siguientes datos.<br>
        <br>
        <table cellspacing="0" style="width: 100%; text-align: left;">
            <tr>
                <td style="width:50%;"></td>
                <td style="width:50%; ">
                    Laboratorio v0.1<br>
                    examenes y analisis medicos<br>
                    Tel : 33 (0) 1 00 00 00 00<br>
                    Email : on_va@chez.moi<br>
                </td>
            </tr>
        </table>
    </nobreak>
</page>

