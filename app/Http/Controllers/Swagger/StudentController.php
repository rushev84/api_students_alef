<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
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
 *     )
 *

 */

class StudentController extends Controller
{

}

