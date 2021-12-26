<?php
use Kavenegar\Exceptions\ApiException;
use Kavenegar\KavenegarApi;

function smsRawSender($receptor, $message): bool
{
    try {
        $api = new KavenegarApi("6362682F53744C387A66546532583154596B3453417553765473666C6148386D69694145766D4A317357413D");
        $sender = "10008663";
        $api->Send($sender, $receptor, $message);
        return true;
    } catch (ApiException $e) {
        return false;

    } catch (\Kavenegar\Exceptions\HttpException $e) {
        return false;
    }
}

function smsSender($phone, $value, $value2, $value3, string $template): array
{
    try {
        $api = new KavenegarApi('');
        $receptor = $phone;
        $token = $value;
        $token2 = $value2;
        $token3 = $value3;
        $template_sender = $template;
        $type = "sms";
        $result = $api->VerifyLookup($receptor, $token, $token2, $token3, $template_sender, $type);
        return ['status' => 200, 'ResponseText' => $result];
    }
    catch (ApiException $e) {
        return ['status' => 5, 'ResponseText' => $e->errorMessage()];
    } catch (\Kavenegar\Exceptions\HttpException $e) {
        return ['status' => 7, 'ResponseText' => $e->errorMessage()];
    }
}