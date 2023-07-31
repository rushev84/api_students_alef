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
 *                 @OA\Property(property="email", type="string"),
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
 */

class StudentClassController extends Controller
{

}
