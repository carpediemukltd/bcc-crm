<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DocumentGroupDocumentManager extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $document_manager = \App\Models\DocumentManager::get();
        $document_data = [
            [
                'key_name' => 'Completed_Application',
                'document_group_id' => 1
            ],
            [
                'key_name' => 'Completed_Debt_Schedule',
                'document_group_id' => 1
            ],
            [
                'key_name' => 'Personal_Financial_Statement',
                'document_group_id' => 1
            ],
            [
                'key_name' => 'Signed_Contingent_Consulting_Retainer_Agreement',
                'document_group_id' => 1
            ],
            [
                'key_name' => 'Miscellaneous_&_Formation_Documents',
                'document_group_id' => 1
            ],
            [
                'key_name' => 'Past_6_Months_of_Bank_Statements',
                'document_group_id' => 2
            ],
            [
                'key_name' => 'Past_3_Years_of_Personal_&_Corporate_Tax_Returns',
                'document_group_id' => 2
            ],
            [
                'key_name' => 'yearToDateProfitLoss',
                'document_group_id' => 2
            ],
            [
                'key_name' => 'yearToDateProfitBalanceSheet',
                'document_group_id' => 2
            ],
            [
                'key_name' => '2023_Corporate_Tax_Return',
                'document_group_id' => 2
            ],
            [
                'key_name' => '2023_Personal_Tax_Return',
                'document_group_id' => 2
            ],
            [
                'key_name' => '2022_Corporate_Tax_Return',
                'document_group_id' => 2
            ],
            [
                'key_name' => '2022_Personal_Tax_Return',
                'document_group_id' => 2
            ],
            [
                'key_name' => '2021_Corporate_Tax_Return',
                'document_group_id' => 2
            ],
            [
                'key_name' => '2021_Personal_Tax_Return',
                'document_group_id' => 2
            ],
            [
                'key_name' => '2020_Corporate_Tax_Return_(Affiliate_Entity)',
                'document_group_id' => 2
            ],
            [
                'key_name' => '2021_Corporate_Tax_Return_(Affiliate_Entity)',
                'document_group_id' => 2
            ],
            [
                'key_name' => '2022_Corporate_Tax_Return_(Affiliate_Entity)',
                'document_group_id' => 2
            ],
            [
                'key_name' => '2022_Year-end_P&L_and_Balance_Sheet_(Affiliate_Entity)',
                'document_group_id' => 2
            ],
            [
                'key_name' => '2023_Year-to-date_P&L_and_Balance_Sheet_(Affiliate_Entity)',
                'document_group_id' => 2
            ],
            [
                'key_name' => 'Driver\'s_License_Voided_Check',
                'document_group_id' => 3
            ],
            [
                'key_name' => 'SBA_1919_Form',
                'document_group_id' => 4
            ],
            [
                'key_name' => 'Use_of_Proceeds',
                'document_group_id' => 4
            ],
            [
                'key_name' => 'Certificate_of_LLC_Members',
                'document_group_id' => 4
            ],
            [
                'key_name' => 'Certificate_of_Corporate_Secretary',
                'document_group_id' => 4
            ],
            [
                'key_name' => 'Landlord_Option_to_Renew',
                'document_group_id' => 4
            ],
            [
                'key_name' => 'Management_Resume_Template',
                'document_group_id' => 4
            ],
            [
                'key_name' => 'Business_Location_Confirmation_(Mortgage_Statement_or_Lease_Agreement)',
                'document_group_id' => 4
            ],
            [
                'key_name' => 'Personal_Location_Confirmation_(Mortgage_Statement_or_Lease_Agreement)',
                'document_group_id' => 4
            ],
            [
                'key_name' => 'Completed_Application',
                'document_group_id' => 5
            ],
            [
                'key_name' => 'Past_6_Months_of_Bank_Statements',
                'document_group_id' => 5
            ],
            [
                'key_name' => '2022_Personal_Tax_Return',
                'document_group_id' => 5
            ],
            [
                'key_name' => '2022_Corporate_Tax_Return',
                'document_group_id' => 5
            ],
            [
                'key_name' => 'Completed_Debt_Schedule',
                'document_group_id' => 5
            ],
            [
                'key_name' => 'Driver\'s_License_Voided_Check',
                'document_group_id' => 5
            ],
            [
                'key_name' => 'Signed_Contingent_Consulting_Retainer_Agreement',
                'document_group_id' => 5
            ],
            [
                'key_name' => 'Completed_Application',
                'document_group_id' => 6
            ],
            [
                'key_name' => 'Past_6_Months_of_Bank_Statements',
                'document_group_id' => 6
            ],
            [
                'key_name' => '2022_Personal_Tax_Return',
                'document_group_id' => 6
            ],
            [
                'key_name' => '2022_Corporate_Tax_Return',
                'document_group_id' => 6
            ],
            [
                'key_name' => 'Completed_Debt_Schedule',
                'document_group_id' => 6
            ],
            [
                'key_name' => 'Driver\'s_License_Voided_Check',
                'document_group_id' => 6
            ],
            [
                'key_name' => 'Signed_Contingent_Consulting_Retainer_Agreement',
                'document_group_id' => 6
            ],
            [
                'key_name' => 'Personal_Financial_Statement',
                'document_group_id' => 6
            ],
            [
                'key_name' => '2021_Corporate_Tax_Return',
                'document_group_id' => 6
            ],
            [
                'key_name' => '2021_Personal_Tax_Return',
                'document_group_id' => 6
            ],
            [
                'key_name' => '2020_Corporate_Tax_Return_(Affiliate_Entity)',
                'document_group_id' => 6
            ],
            [
                'key_name' => 'yearToDateProfitLoss',
                'document_group_id' => 6
            ],
            [
                'key_name' => 'yearToDateProfitBalanceSheet',
                'document_group_id' => 6
            ]
        ];

        foreach($document_data as $data){
            $document_manager_id = 0;
            foreach ($document_manager as $manager){
                if($manager->key_name == $data['key_name']){
                    $document_manager_id = $manager->id;
                    break;
                }
            }
            if($document_manager_id != 0){
                \App\Models\DocumentGroupDocumentManager::updateOrInsert(
                    ['document_manager_id' => $document_manager_id, 'document_group_id' => $data['document_group_id']],
                    ['document_group_id' => $data['document_group_id']]
                );
            }
        }
    }
}
