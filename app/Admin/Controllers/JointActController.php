<?php

namespace App\Admin\Controllers;

use App\Models\joinActUser;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class JointActController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '連棟活動玩家資訊';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new joinActUser());

        $grid->column('user', __('帳號'));
        $grid->column('cbo_reward_server', __('cbo_獎勵伺服器'))->display(function () {
            if ($this->cbo_reward_server == 1) {
                return '冰珀星';
            } elseif ($this->cbo_reward_server == 2) {
                return '黑恆星';
            } else {
                return '尚未領取';
            }
        });
        $grid->column('cbo_reward_get', __('cbo_獎領是否領取'))->display(function () {
            if ($this->cbo_reward_get == 'y') {
                return '已領取';
            } else {
                return '尚未領取';
            }
        });
        $grid->column('cbm_serial_number', __('cbM_序號'));
        $grid->column('ip', __('Ip'));
        $grid->column('created_at', __('建立時間'));
        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->equal('ip', 'ip');
            $filter->equal('user', '帳號');
        });
        $grid->disableRowSelector();
        $grid->disableExport();
        $grid->disableActions();
        $grid->disableCreateButton();
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(prereg_user::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('phone', __('Phone'));
        $show->field('type', __('Type'));
        $show->field('ip', __('Ip'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new prereg_user());

        $form->mobile('phone', __('手機號碼'));
        $form->text('type', __('手機型號'));
        $form->ip('ip', __('Ip'));

        return $form;
    }
}
