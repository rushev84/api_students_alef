<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 *
 * @OA\Get(
 *     path="/api/students",
 *     summary="Получение списка студентов",
 *     tags={"Студенты"},
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer"),
 *              @OA\Property(property="name", type="string"),
 *              @OA\Property(property="email", type="string"),
 *              ),
 *              example={
 *                  {
 *                      "id": 1,
 *                      "name": "Андрей Козлов",
 *                      "email": "kozlov@mail.ru",
 *                  },
 *                  {
 *                      "id": 2,
 *                      "name": "Виктор Кулешов",
 *                      "email": "kuleshov@mail.ru",
 *                  },
 *                  {
 *                      "id": 4,
 *                      "name": "Вячеслав Иванов",
 *                      "email": "ivanov@mail.ru",
 *                  },
 *              }
 *         ),
 *     ),
 * ),
 *
 * @OA\Get(
 *     path="/api/students/{id}",
 *     summary="Получение информации о конкретном студенте (имя, email, класс, прослушанные лекции)",
 *     tags={"Студенты"},
 *     @OA\Parameter(
 *         description="id студента",
 *         in="path",
 *         name="id",
 *         required=true,
 *         example=1,
 *     ),
 *
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example="1"),
 *             @OA\Property(property="name", type="string", maxLength=255, pattern="^[^0-9]*$", example="Иван Иванов"),
 *             @OA\Property(property="email", type="string", format="email", example="ivanov@mail.ru"),
 *             @OA\Property(property="student_class", type="object",
 *                 @OA\Property(property="id", type="integer", example=3),
 *                 @OA\Property(property="name", type="string", example="02-СВ"),
 *             ),
 *             @OA\Property(property="lectures", type="array", @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="topic", type="string", example="Введение в ООП"),
 *                 @OA\Property(property="description", type="string", example="В этой лекции вы познакомитесь с объектно ориентированным программированием на PHP. Вы узнаете о классах, интерфейсах, инкапсуляции и магических методах. В итоге поймете, для чего нужны классы как абстракция данных. Знание основ объектно ориентированного программирования пригодится, чтобы понимать плюсы и минусы кода с классами и объектами. Также это поможет использовать объекты для реализации программной логики. Этот курс подойдет тем, кто уже хорошо знаком с языком PHP. Чтобы учиться было проще, стоит заранее изучить курсы: «Основы PHP», «PHP: Массивы», «PHP: Ассоциативные массивы» и «PHP: Функции»."),
 *                 ),
 *             ),
 *         ),
 *     ),
 * ),
 *
 * @OA\Post(
 *     path="/api/students",
 *     summary="Создание студента",
 *     tags={"Студенты"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                      required={"name", "email", "student_class_id"},
 *                      @OA\Property(property="name", type="string", maxLength=255, pattern="^[^0-9]*$", example="Иван Иванов"),
 *                      @OA\Property(property="email", type="string", format="email", example="ivanov@mail.ru"),
 *                      @OA\Property(property="student_class_id", type="integer", example=3),
 *                 ),
 *             }
 *         ),
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Студент успешно создан!"),
 *         ),
 *     ),
 *
 * ),
 *
 * @OA\Put(
 *     path="/api/students/{id}",
 *     summary="Обновить информацию о студенте",
 *     tags={"Студенты"},
 *     @OA\Parameter(
 *         description="id студента",
 *         in="path",
 *         name="id",
 *         required=true,
 *         example=1,
 *     ),
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                      required={"name", "email", "student_class_id"},
 *                      @OA\Property(property="name", type="string", maxLength=255, pattern="^[^0-9]*$", example="Иван Ивановский"),
 *                      @OA\Property(property="student_class_id", type="integer", example=3),
 *                 ),
 *             }
 *         ),
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Студент успешно обновлён!"),
 *         ),
 *     ),
 * ),
 *
 * @OA\Delete(
 *     path="/api/students/{id}",
 *     summary="Удалить студента",
 *     tags={"Студенты"},
 *     @OA\Parameter(
 *         description="id студента",
 *         in="path",
 *         name="id",
 *         required=true,
 *         example=1,
 *     ),
 *
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Студент успешно удалён!"),
 *         ),
 *     ),
 * ),
 *

 */

class StudentController extends Controller
{

}

