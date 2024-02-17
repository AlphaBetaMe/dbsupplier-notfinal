@extends('layouts.sample')
@section('content')
$client = new \GuzzleHttp\Client();

$response = $client->request('POST', 'https://api.paymongo.com/v1/sources', [
  'body' => '{"data":{"attributes":{"amount":10000,"redirect":{"success":"http://localhost:8000/frontend/success","failed":"http://localhost:8000/frontend/failed"},"type":"gcash","currency":"PHP"}}}',
  'headers' => [
    'accept' => 'application/json',
    'authorization' => 'Basic cGtfdGVzdF9QeUVlbnkxeE1TNTNndUdxZVZ6RUwxY3k6c2tfdGVzdF95UW9TWGpqVFpwVjRHeXRZNzlHODhvcWQ=',
    'content-type' => 'application/json',
  ],
]);

echo $response->getBody();
@endsection