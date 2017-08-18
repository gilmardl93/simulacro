@extends('layouts.base')

@section('content')
<div class="col-md-12">
    <!-- BEGIN PORTLET-->
    <div class="portlet light tasks-widget widget-comments">
        <div class="portlet-title margin-bottom-20">
            <div class="caption caption-md font-red-sunglo">
                <span class="caption-subject theme-font bold uppercase">REGLAMENTO DEL SIMULACRO DE ADMISION DE LA UNI</span>
            </div>
            <div class="actions">
                {!!Form::back(route('home.index'))!!}
            </div>
        </div>
        <div class="form-body ">
            <h1>CONOCE TU TALENTO</h1>
            <dl>
                <dt>Art 1</dt>
                <dd>Pueden participar todos los estudiantes o egresados de secundaria de Educación Básica Regular o Educación Básica Alternativa. La inscripción de un participante en este simulacro implica el total conocimiento y aceptación de este reglamento.</dd>
                <dt>Art 2</dt>
                <dd>Para participar, los interesados deberán registrarse en la página web www.admision.uni.edu.pe e imprimir su formato de pago, con la que realizarán el pago en cualquier oficina del Scotiabank. Luego de dos horas de realizar el pago, podrás imprimir tu Ficha de Participante, la que deberán imprimir para presentarla el día del simulacro, junto con su DNI.</dd>
                <dt>Art 3</dt>
                <dd>El simulacro consiste en una prueba que se realizará simultáneamente en las ciudades de Lima y Huancayo.</dd>
                <dt>Art 4</dt>
                <dd>4. La prueba tendrá un total de 100 preguntas que serán respondidas en hojas ópticas de lectura automática como las que se aplicará en los Concursos de Admisión. Las materias a evaluar serán las siguientes:</dd>
                <dd>
                        <table class="table table-bordered table-hover" data-toggle="table" data-pagination="true">
                            <thead>
                                <tr>
                                    <th class="text-center"> Tema </th>
                                    <th class="text-center"> Pregunta </th>
                                    <th class="text-center"> Puntaje </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="text-center"> Total </th>
                                    <th class="text-center"> 100 Preguntas </th>
                                    <th class="text-center"> 1000 Puntos </th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td class="text-center"> Física </td>
                                    <td class="text-center"> 10 preguntas </td>
                                    <td class="text-center"> 100 puntos </td>
                                </tr>
                                <tr>
                                    <td class="text-center"> Química </td>
                                    <td class="text-center"> 10 preguntas </td>
                                    <td class="text-center"> 100 puntos </td>
                                </tr>
                                <tr>
                                    <td class="text-center"> Aritmética y Algebra </td>
                                    <td class="text-center"> 20 preguntas </td>
                                    <td class="text-center"> 200 puntos </td>
                                </tr>
                                <tr>
                                    <td class="text-center"> Geometría y Trigonometría </td>
                                    <td class="text-center"> 19 preguntas </td>
                                    <td class="text-center"> 190 puntos </td>
                                </tr>
                                <tr>
                                    <td class="text-center"> Humanidades </td>
                                    <td class="text-center"> 11 preguntas </td>
                                    <td class="text-center"> 110 puntos </td>
                                </tr>
                                <tr>
                                    <td class="text-center"> Razonamiento Matemático </td>
                                    <td class="text-center"> 13 preguntas </td>
                                    <td class="text-center"> 130 puntos </td>
                                </tr>
                                <tr>
                                    <td class="text-center"> Razonamiento Verbal </td>
                                    <td class="text-center"> 17 preguntas </td>
                                    <td class="text-center"> 170 puntos </td>
                                </tr>
                            </tbody>
                        </table>

                <dt>Art 5</dt>
                <dd>5. Los resultados del Simulacro serán informados a los participantes a través de un reporte en línea, indicándoles su nivel de conocimientos (reporte de incidencia de las preguntas y respuestas) de las materias del  numeral 4.</dd>
                <dt>Art 6</dt>
                <dd>La calificación máxima será de 1 000 puntos. Habrá puntaje negativo para las preguntas respondidas erróneamente. El puntaje obtenido será transformado a escala vigesimal, truncado al tercer decimal. La calificación es inapelable.</dd>
                <dt>Art 7</dt>
                <dd>Los resultados se publicarán el mismo día de la aplicación en la página web <a href="http://www.admision.uni.edu.pe">www.admision.uni.edu.pe</a>   y en su cuenta de registro.</dd>
                <dt>Art 8</dt>
                <dd>Los participantes que alcancen el primer y segundo puesto por especialidad tentativa (1) (con nota mayor o igual a 12) quedarán exonerados del 50% del derecho de inscripción al Concurso de Admisión al que decida postular, este derecho podrá ser acumulable dentro de los dos años calendario siguientes al otorgamiento de la primera exoneración. No siendo transferible ni acumulable con ningún otro beneficio que otorgue la OCAD.</dd>
                <dt>Art 9</dt>
                <dd>El puntaje obtenido en el Simulacro no es válido para el Concurso de Admisión.</dd>
            </dl>
            {!!Form::back(route('home.index'))!!}
        </div>
    </div>
    <!-- END PORTLET-->
</div>

@stop

