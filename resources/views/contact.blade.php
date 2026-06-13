@extends('layout.app')
@section('title', 'Contact Us')

@section('content')
    <h2>📞 Contact Us</h2>
    <p>We'd love to hear from you! Get in touch with us through any of the following channels.</p>
    
    <div style="margin-top: 30px; display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
        <div style="padding: 20px; background: #f9f9f9; border-radius: 8px; border-left: 4px solid #e74c3c;">
            <h3 style="color: #e74c3c; margin-bottom: 10px;">📧 Email</h3>
            <p style="color: #666;">info@example.com</p>
        </div>
        
        <div style="padding: 20px; background: #f9f9f9; border-radius: 8px; border-left: 4px solid #3498db;">
            <h3 style="color: #3498db; margin-bottom: 10px;">📱 Phone</h3>
            <p style="color: #666;">+63 912 345 6789</p>
        </div>
        
        <div style="padding: 20px; background: #f9f9f9; border-radius: 8px; border-left: 4px solid #27ae60;">
            <h3 style="color: #27ae60; margin-bottom: 10px;">📍 Address</h3>
            <p style="color: #666;">Sorsogon City, Philippines</p>
        </div>
    </div>

    <div style="margin-top: 30px; padding: 20px; background: #f0f8ff; border-radius: 8px;">
        <h3 style="color: #2c3e50; margin-bottom: 15px;">✉️ Send us a message</h3>
        <p style="color: #666; margin-bottom: 15px;">Have a question or feedback? We're here to help!</p>
        <div style="display: flex; gap: 10px;">
            <input type="text" placeholder="Your name..." style="flex: 1; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-family: inherit;">
            <button style="padding: 12px 28px; background: #27ae60; color: white; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; transition: all 0.3s;">Send</button>
        </div>
    </div>
@endsection