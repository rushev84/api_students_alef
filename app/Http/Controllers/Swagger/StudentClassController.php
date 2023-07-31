<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Get(
 *     path="/api/classes",
 *     summary="Получение списка классов",
 *     tags={"Классы"},
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer"),
 *              @OA\Property(property="name", type="string"),
 *              ),
 *              example={
 *                  {
 *                      "id": 3,
 *                      "name": "02-СВ",
 *                  },
 *                  {
 *                      "id": 4,
 *                      "name": "05-ДВ",
 *                  },
 *                  {
 *                      "id": 5,
 *                      "name": "01-КГ",
 *                  },
 *              }
 *         ),
 *     ),
 * ),
 *
 * @OA\Post(
 *     path="/api/classes",
 *     summary="Создание класса",
 *     tags={"Классы"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                      required={"name"},
 *                      @OA\Property(property="name", type="string", maxLength=255, example="05-ПП"),
 *                 ),
 *             }
 *         ),
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Класс успешно создан!"),
 *         ),
 *     ),
 *
 * ),
 *
 * @OA\Get(
 *     path="/api/classes/{id}",
 *     summary="Получение информации о конкретном классе (название, студенты класса)",
 *     tags={"Классы"},
 *     @OA\Parameter(
 *         description="id класса",
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
 *             @OA\Property(property="id", type="integer", example="3"),
 *             @OA\Property(property="name", type="string", maxLength=255, example="02-СВ"),
 *             @OA\Property(property="students", type="array", @OA\Items(
 *                 @OA\Property(property="id", type="string"),
 *                 @OA\Property(property="name", type="string"),
 *                 ),
 *                 example={
 *                     {
 *                         "id": 1,
 *                         "name": "Андрей Козлов",
 *                     },
 *                     {
 *                         "id": 9,
 *                         "name": "Виталий Дьяков",
 *                     },
 *                     {
 *                         "id": 11,
 *                         "name": "Андрей Афанасьев",
 *                     },
 *                 }
 *             ),
 *         ),
 *     ),
 * ),
 *
 * @OA\Put(
 *     path="/api/classes/{id}",
 *     summary="Обновить информацию о классе",
 *     tags={"Классы"},
 *     @OA\Parameter(
 *         description="id класса",
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
 *                      required={"name"},
 *                      @OA\Property(property="name", type="string", maxLength=255, example="07-РВ"),
 *                 ),
 *             }
 *         ),
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Класс успешно обновлён!"),
 *         ),
 *     ),
 * ),
 *
 * @OA\Delete(
 *     path="/api/classes/{id}",
 *     summary="Удалить класс",
 *     tags={"Классы"},
 *     @OA\Parameter(
 *         description="id класса",
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
 *             @OA\Property(property="message", type="string", example="Класс успешно удалён!"),
 *         ),
 *     ),
 * ),
 *
 * @OA\Get(
 *     path="/api/classes/{id}/curriculum",
 *     summary="Получение учебного плана (списка лекций) для конкретного класса",
 *     tags={"Классы"},
 *     @OA\Parameter(
 *         description="id класса",
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
 *             @OA\Property(property="id", type="integer", example="3"),
 *             @OA\Property(property="name", type="string", maxLength=255, example="02-СВ"),
 *             @OA\Property(property="curriculums", type="array", @OA\Items(
 *                 @OA\Property(property="order", type="string"),
 *                 @OA\Property(property="lecture", type="array", @OA\Items(
 *                         @OA\Property(property="id", type="integer"),
 *                         @OA\Property(property="topic", type="string"),
 *                         @OA\Property(property="description", type="string"),
 *                         ),
 *                     ),
 *                 ),
 *                 example={
 *                     "id": 1,
 *                     "name": "02-СВ",
 *                     "curriculums": {
 *                         {
 *                             "order": 1,
 *                             "lecture": {
 *                                 "id": 6,
 *                                 "topic": "Введение в ООП",
 *                                 "description": "В этой лекции вы познакомитесь с объектно ориентированным программированием на PHP. Вы узнаете о классах, интерфейсах, инкапсуляции и магических методах. В итоге поймете, для чего нужны классы как абстракция данных. Знание основ объектно ориентированного программирования пригодится, чтобы понимать плюсы и минусы кода с классами и объектами. Также это поможет использовать объекты для реализации программной логики. Этот курс подойдет тем, кто уже хорошо знаком с языком PHP. Чтобы учиться было проще, стоит заранее изучить курсы: «Основы PHP», «PHP: Массивы», «PHP: Ассоциативные массивы» и «PHP: Функции».",
 *                             },
 *                         },
 *                         {
 *                             "order": 2,
 *                             "lecture": {
 *                                 "id": 5,
 *                                 "topic": "Объектно-ориентированный дизайн",
 *                                 "description": "В этой лекции вы познакомитесь с объектно ориентированным дизайном. Вы узнаете о паттернах, текучем интерфейсе и полезных популярных библиотеках. В итоге поймете, как правильно организовывать код, написанный на классах. Знания объектно ориентированного дизайна пригодятся, чтобы создавать и использовать цепочки функций, в том числе в неизменяемом стиле. Также они помогут правильно организовывать состояние объектов и проектировать безопасные сеттеры. Этот курс подойдет тем, кто уже хорошо знаком с языком PHP. Чтобы учиться было проще, стоит заранее изучить курсы: «Основы PHP», «PHP: Массивы», «PHP: Ассоциативные массивы» и «PHP: Функции».",
 *                             },
 *                         },
 *                     },
 *                 }
 *             ),
 *         ),
 *     ),
 * ),
 *
 */

class StudentClassController extends Controller
{

}
