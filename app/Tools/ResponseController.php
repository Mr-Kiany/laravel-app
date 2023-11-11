<?php

namespace App\Tools\ResponseOutput;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as Res;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class ResponseController extends Controller
{

    /**
     * @param null $data
     * @return JsonResponse
     */
    public function respondCreated($data = null)
    {
        return response()->json([
            'status' => 'success',
            'status_code' => Res::HTTP_CREATED,
            'message' => 'عملیات درج اطلاعات با موفقیت صورت گرفت',
            'data' => $data
        ], Res::HTTP_CREATED, ['charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param null $data
     * @param string $message
     * @return JsonResponse
     */

    public function respondUpdated($data = null, $message = 'عملیات بروز رسانی اطلاعات با موفقیت صورت گرفت')
    {
        return response()->json([
            'status' => 'success',
            'status_code' => Res::HTTP_OK,
            'message' => $message,
            'data' => $data
        ], Res::HTTP_OK, ['charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param $data
     * @return JsonResponse
     */
    public function respond($data)
    {
        return response()->json([
            'status' => 'success',
            'status_code' => Res::HTTP_OK,
            'data' => $data
        ], Res::HTTP_OK, ['charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }


    public function respondWithResource($data)
    {
        return [
            'status' => 'success',
            'status_code' => Res::HTTP_OK,
            'data' => $data
        ];
    }


    /**
     * @param null $data
     * @return JsonResponse
     */
    public function respondDeleted($data = null)
    {
        return response()->json([
            'status' => 'success',
            'status_code' => Res::HTTP_OK,
            'message' => 'عملیات حذف اطلاعات با موفقیت صورت گرفت',
            'data' => $data,
        ], Res::HTTP_OK, ['charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param string $msg
     * @return JsonResponse
     */
    public function respondNotFound($msg = 'not found!')
    {
        return response()->json([
            'status' => 'error',
            'status_code' => Res::HTTP_NOT_FOUND,
            'message' => $msg,
        ], Res::HTTP_NOT_FOUND, ['charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param $msg
     * @return JsonResponse
     */
    public function respondInternalServerError($msg)
    {
        return response()->json([
            'status' => 'error',
            'status_code' => Res::HTTP_INTERNAL_SERVER_ERROR,
            'message' => $msg,
        ], Res::HTTP_INTERNAL_SERVER_ERROR, ['charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);

    }

    /**
     * @param $message
     * @param $errors
     * @return JsonResponse
     */

    public function respondValidationError($message, $errors)
    {
        return response()->json([
            'status' => 'error',
            'status_code' => Res::HTTP_UNPROCESSABLE_ENTITY,
            'message' => $message,
            'errors' => $errors
        ], Res::HTTP_UNPROCESSABLE_ENTITY, ['charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param $message
     * @param $errors
     * @return JsonResponse
     */
    public function respondOtpExpiredValidationError($message, $errors)
    {
        return response()->json([
            'status' => 'otp_expired_error',
            'status_code' => Res::HTTP_UNPROCESSABLE_ENTITY,
            'message' => $message,
            'errors' => $errors
        ], Res::HTTP_UNPROCESSABLE_ENTITY, ['charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }


    /**
     * @return JsonResponse
     */

    public function respondUnauthorizedError()
    {
        return response()->json([
            'status' => 'error',
            'status_code' => Res::HTTP_UNAUTHORIZED,
            'message' => '401 Unauthorized !',
        ], Res::HTTP_UNAUTHORIZED, ['charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return JsonResponse
     */
    public function respondForbiddenError()
    {
        return response()->json([
            'status' => 'error',
            'status_code' => Res::HTTP_FORBIDDEN,
            'message' => '403 forbidden !',
        ], Res::HTTP_FORBIDDEN, ['charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return JsonResponse
     */
    public function respondNotAcceptableError($message)
    {
        return response()->json([
            'status' => 'error',
            'status_code' => Res::HTTP_NOT_ACCEPTABLE,
            'message' => $message,
        ], Res::HTTP_NOT_ACCEPTABLE, ['charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param Paginator $paginate
     * @param $data
     * @param string $message
     * @return JsonResponse
     */

    protected function respondWithPagination(Paginator $paginate, $data, $message = '')
    {
        return response()->json([
            'status' => 'success',
            'status_code' => Res::HTTP_OK,
            'message' => $message,
            'data' => $data,
            'paginator' => [
                'total_count' => $paginate->total(),
                'total_pages' => ceil($paginate->total() / $paginate->perPage()),
                'current_page' => $paginate->currentPage(),
                'limit' => $paginate->perPage(),
            ]
        ], Res::HTTP_OK, ['charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param $limit
     * @param $offset
     * @param $data
     * @return JsonResponse
     */

    protected function respondWithCustomPagination($limit, $offset, $data)
    {
        return response()->json([
            'status' => 'success',
            'limit' => $limit,
            'offset' => $offset,
            'status_code' => Res::HTTP_OK,
            'data' => $data,
        ], Res::HTTP_OK, ['charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }


    public function respondValidationErrorOtpHasSentRecently($message, $errors)
    {
        return response()->json([
            'status' => 'otp_has_sent_recently_error',
            'status_code' => Res::HTTP_UNPROCESSABLE_ENTITY,
            'message' => $message,
            'errors' => $errors
        ], Res::HTTP_UNPROCESSABLE_ENTITY, ['charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }

}
