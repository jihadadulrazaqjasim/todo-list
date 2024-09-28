<?php

use App\Helpers\Constants;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;

if (! function_exists('customPaginate')) {
    function customPaginate($request, &$query): array
    {
        $perPage = $request->input('per_page', Constants::PAGINATION_PER_PAGE);
        $currentPage = $request->input('page', Constants::PAGINATION_DEFAULT_PAGE);
        $total = $query->count();

        $totalPages = (int) ceil($total / $perPage);
        $firstItem = $total > 0 ? ($currentPage - 1) * $perPage + 1 : null;
        $to = $total > 0 ? $firstItem + $perPage - 1 : null;
        $lastPage = max($totalPages, 1);

        $data = [
            'total' => $total,
            'totalPages' => $totalPages,
            'perPage' => (int) $perPage,
            'currentPage' => (int) $currentPage,
            'lastPage' => (int) $lastPage,
            'isLastPage' => $currentPage == $lastPage,
            'isFirstPage' => $currentPage == 1,
            'from' => (int) $firstItem,
            'to' => $total < (int) $to ? $total : $to,
        ];

        $skip = $perPage * ($currentPage - 1);
        $query->skip($skip)->limit($perPage);

        return $data;
    }
}

if (! function_exists('jsonResponse')) {
    function jsonResponse(
        int $status = Response::HTTP_OK,
        string $message = '',
        array|object|null $data = null,
        ?array $extraData = null,
        array $errors = [],
        array $meta = []): Response
    {

        $content = compact('message', 'extraData', 'errors', 'meta');

        return response()->json(Arr::where($content, fn ($value) => ! empty($value)) + compact('data'), $status);
    }
}

if (! function_exists('formatDate')) {
    function formatDate($date): string
    {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    if (! function_exists('orderByColumn')) {
        function orderByColumn(&$query, $request): void
        {
            $query->orderBy($request->input(key: 'sort_column', default: 'created_at'), direction: $request->input(key: 'sort_dir', default: 'desc'));
        }
    }
}
