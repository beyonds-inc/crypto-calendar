<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'user_id' => '1',
          'title' => '「新事業企画・起業のための 実践ブロックチェーン・ビジネス5」ICO、投資動向',
          'url' => 'https://peatix.com/event/385222?utm_campaign=search&utm_medium=web&utm_source=results&utm_content=%E3%83%96%E3%83%AD%E3%83%83%E3%82%AF%E3%83%81%E3%82%A7%E3%83%BC%E3%83%B3%3A35.685%2C139.7514%3A%3A0%3A385222',
          'date' => '2018-06-27',
          'first_time' => '19:00:00',
          'end_time' => '20:30:00',
          'prefectures' => '東京',
          'body' => '分散型で透明性にすぐれ、改竄や二重支払いを防ぐことができ、中央管理者が不要なブロックチェーンは、ビジネスの可能性を広げ...',
      ];
      DB::table('posts')->insert($param);

        $param = [
          'user_id' => '1',
          'title' => '【BBCミートアップ#11 】台湾ブロックチェーン業界最新動向 & トークンエコノミー No.2 ペイメント',
          'url' => 'https://bbcmeetup11.peatix.com/?utm_campaign=search&utm_medium=web&utm_source=results&utm_content=%E3%83%96%E3%83%AD%E3%83%83%E3%82%AF%E3%83%81%E3%82%A7%E3%83%BC%E3%83%B3%3A35.685%2C139.7514%3A%3A3%3A398101',
          'date' => '2018-07-24',
          'first_time' => '19:00:00',
          'end_time' => '21:30:00',
          'prefectures' => '東京',
          'body' => 'ビットコインをはじめとする仮想通貨は「支払手段」として誕生しました。しかし、昨年末頃からの動きとして、大手ゲーム配信サイトのSteamやDMM.comなどが相次いでビットコインでの決済を停止しています',
      ];
      DB::table('posts')->insert($param);

        $param = [
          'user_id' => '1',
          'title' => 'ブロックチェーン座学会＃1',
          'url' => 'https://wakuwaku.connpass.com/event/90016/',
          'date' => '2018-07-02',
          'first_time' => '19:00:00',
          'end_time' => '21:00:00',
          'prefectures' => '東京',
          'body' => '暗号通貨/ブロックチェーン座学会は運営コミュニティによって、外部の方をお招きして勉強会を行っています。',
      ];
      DB::table('posts')->insert($param);

    }
    }
