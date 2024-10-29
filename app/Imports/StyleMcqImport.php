<?php

namespace App\Imports;

use App\Models\Style;
use App\Models\StyleMcqContent;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithColumnLimit;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StyleMcqImport implements ToModel,WithHeadingRow, WithColumnLimit
{

    public function model(array $row)
    {

        if(str_replace(' ', '', $row['basis']) !== '' && $row['basis'] !== null) {
            //check if row was blank

            //create basis
            $style = Style::where('style_code', $row['basis'])->first();

            if ($style === null) {
                $style = Style::create([
                    'style_code' => $row['basis'],
                    'user_id' => auth()->user()->id,
                ]);
            }

            if(count($style->mcq_contents) === 0){
                //check if have mcq in database if no have insert
                $this->insertStyleMcqContent($row,$style);

            }else{
                //if exist check the basis
                $style_mcq = StyleMcqContent::where([
                    ['style_size',$row['size']],
                    ['carton_measurement', $row['carton']],
                    ['style_id', $style->id],
                ])->first();

                if($style_mcq === null){
                    //if no have insert new
                    $this->insertStyleMcqContent($row,$style);

                }else{
                    //if exist just update weight and mcq
                    $style_mcq->update([
                        'style_weight' => $row['weight'],
                        'mcq' => $row['mcq'],
                    ]);
                }

            }


        }

        return [];
    }

    public function endColumn(): string
    {
        return 'E';
    }

    private function insertStyleMcqContent($row,$style)
    {
        $data = [
            'style_size' => $row['size'],
            'style_weight' => $row['weight'],
            'carton_measurement' => $row['carton'],
            'mcq' => $row['mcq'],
        ];
        $style->mcq_contents()->create($data);
    }
}
