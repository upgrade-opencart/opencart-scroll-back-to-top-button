<?php
class ControllerExtensionModuleScrollUp extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/module/scrollUp');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('module_scrollUp', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/scrollUp', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/module/scrollUp', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);
		
		//extension code starts here
        
		//start code of status here
		
		if (isset($this->request->post['module_scrollUp_status'])) {
			$data['module_scrollUp_status'] = $this->request->post['module_scrollUp_status'];
		} else {
			$data['module_scrollUp_status'] = $this->config->get('module_scrollUp_status');
		}
		
		//end code of status here
		
		//start code of arrow type here
		
		if (isset($this->request->post['module_scrollUp_preference'])) {
			$data['module_scrollUp_preference'] = $this->request->post['module_scrollUp_preference'];
		} else {
			$data['module_scrollUp_preference'] = $this->config->get('module_scrollUp_preference');
		}				
		
		//end code of arrow type here
		
		//start code of custom image here
		
		$this->load->model('tool/image');

		$data['original_path']="";

		if (isset($this->request->post['module_scrollUp_image'])) {
			$data['module_scrollUp_image'] =$this->model_tool_image->resize( $this->request->post['module_scrollUp_image'],60,60);
			$data['original_path']=$this->request->post['module_scrollUp_image'];
		} else {
			if($this->config->get('module_scrollUp_image'))
			$data['module_scrollUp_image'] = $this->model_tool_image->resize($this->config->get('module_scrollUp_image'),60,60);
		else
			$data['module_scrollUp_image'] =  $this->model_tool_image->resize('no_image.png', 60, 60);

			$data['original_path']=$this->config->get('module_scrollUp_image');
		}
		
		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 60, 60);
		
		//end code of custom image here
		
		//start code of height and width for (desktop,tablet,mobile) here
		
		if (isset($this->request->post['module_scrollUp_height_desktop'])) {
			$data['module_scrollUp_height_desktop'] = $this->request->post['module_scrollUp_height_desktop'];
		} else {
			$data['module_scrollUp_height_desktop'] = $this->config->get('module_scrollUp_height_desktop');
		}

		if (isset($this->request->post['module_scrollUp_width_desktop'])) {
			$data['module_scrollUp_width_desktop'] = $this->request->post['module_scrollUp_width_desktop'];
		} else {
			$data['module_scrollUp_width_desktop'] = $this->config->get('module_scrollUp_width_desktop');
		}
		
		if (isset($this->request->post['module_scrollUp_height_tablet'])) {
			$data['module_scrollUp_height_tablet'] = $this->request->post['module_scrollUp_height_tablet'];
		} else {
			$data['module_scrollUp_height_tablet'] = $this->config->get('module_scrollUp_height_tablet');
		}

		if (isset($this->request->post['module_scrollUp_width_tablet'])) {
			$data['module_scrollUp_width_tablet'] = $this->request->post['module_scrollUp_width_tablet'];
		} else {
			$data['module_scrollUp_width_tablet'] = $this->config->get('module_scrollUp_width_tablet');
		}
		
		if (isset($this->request->post['module_scrollUp_height_mobile'])) {
			$data['module_scrollUp_height_mobile'] = $this->request->post['module_scrollUp_height_mobile'];
		} else {
			$data['module_scrollUp_height_mobile'] = $this->config->get('module_scrollUp_height_mobile');
		}

		if (isset($this->request->post['module_scrollUp_width_mobile'])) {
			$data['module_scrollUp_width_mobile'] = $this->request->post['module_scrollUp_width_mobile'];
		} else {
			$data['module_scrollUp_width_mobile'] = $this->config->get('module_scrollUp_width_mobile');
		}
		
		//end code of height and width for (desktop,tablet,mobile) here
		
		//start code of default images here
		
		if (isset($this->request->post['module_scrollUp_optradio'])) {
			$data['module_scrollUp_optradio'] = $this->request->post['module_scrollUp_optradio'];
		} else {
			$data['module_scrollUp_optradio'] = $this->config->get('module_scrollUp_optradio');
		}
		
		//end code of default images here
		
		//start code of devices to display here
		
		if (isset($this->request->post['module_scrollUp_desktop'])) {
			$data['module_scrollUp_desktop'] = $this->request->post['module_scrollUp_desktop'];
		} else {
			$data['module_scrollUp_desktop'] = $this->config->get('module_scrollUp_desktop');
		}
		
		if (isset($this->request->post['module_scrollUp_tablet'])) {
			$data['module_scrollUp_tablet'] = $this->request->post['module_scrollUp_tablet'];
		} else {
			$data['module_scrollUp_tablet'] = $this->config->get('module_scrollUp_tablet');
		}

		if (isset($this->request->post['module_scrollUp_mobile'])) {
			$data['module_scrollUp_mobile'] = $this->request->post['module_scrollUp_mobile'];
		} else {
			$data['module_scrollUp_mobile'] = $this->config->get('module_scrollUp_mobile');
		}
        
		//end code of devices to display here
		
		//extension code end here
		

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/scrollUp', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/scrollUp')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}